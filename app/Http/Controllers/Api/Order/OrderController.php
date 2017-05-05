<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\App\Order\Order;
use App\Models\App\Order\OrderDetail;
use App\Models\App\Restaurant\Goods;
use App\Models\App\Restaurant\Waiter;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 订单控制器
 *
 * Class OrderController
 * @package App\Http\Controllers\Api
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的订单列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的订单的页面
     *
     * @deprecated
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的订单存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Order::all()->count() + 1;
        $waitersId = $request->header(Order::WAITERS_ID);
        $totalPrice = $request->header(Order::TOTAL_PRICE);
        $notes = $request->header(Order::NOTES);
        $restaurantInfoId = $request->header(Order::RESTAURANT_INFO_ID);
        $status = $request->header(Order::STATUS);
        $tablesId = $request->header(Order::TABLES_ID);
        $userInfoUid = $request->header(Order::USER_INFO_UID);

        if (empty($waitersId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $order = new Order();
        $order->id = $id;
        $order->waiters_id = $waitersId;
        $order->total_price = $totalPrice;
        $order->notes = $notes;
        $order->restaurant_info_id = $restaurantInfoId;
        $order->status = $status;
        $order->tables_id = $tablesId;
        $order->user_info_uid = $userInfoUid;
        $order->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定订单的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $order = Order::find($id);
        return response()->json($order->toArray());
    }

    /**
     * 创建新的完整的订单
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function order(Request $request)
    {
        //TODO:订单编号会是自增的
        //TODO:目前采取的策略是找到Waiter中空闲的,但实际上可能存在全满状态(暂时不考虑)

        $details = $request->input('details');

        $id = Waiter::all()->count() + 1;
        $restaurant_info_id = $request->input('restaurant_info_id');
        $newOrder = new Order();
        $newOrder->ID = $id;
        $newOrder->WAITERS_ID = $this->getAvailableWaiter($restaurant_info_id);
        $newOrder->TOTAL_PRICE = 0;
        $newOrder->NOTES = $request->input('notes');
        $newOrder->RESTAURANT_INFO_ID = $restaurant_info_id;
        $newOrder->STATUS = $request->input('status');
        $newOrder->TABLES_ID = $request->input('tables_id');
        $newOrder->USER_INFO_UID = $request->input('user_info_uid');
        $newOrder->save();

        for ($i = 0; $i < count($details); $i++) {
            $detailId = OrderDetail::all()->count() + 1;

            $orderDetail = new OrderDetail();
            $orderDetail->ID = $detailId;
            $orderDetail->ORDERS_ID = $newOrder->ID;
            $orderDetail->GOODS_ID = $details[$i]['goods_id'];
            $orderDetail->STATUS = $details[$i]['status'];
            $orderDetail->QUANTITY = $details[$i]['quantity'];
            $orderDetail->save();
        }

        return response()->json([
            'code' => 0,
            'msg' => '接口调用成功',
            'data' => [
                'order_id' => $newOrder->ID,
                'waiters_id' => $newOrder->WAITERS_ID
            ]
        ]);
    }

    /**
     * 从Waiter中找到一个空闲的服务员,
     * 同时修改其状态
     *
     * @param $restaurant_info_id
     * @return mixed
     */
    private function getAvailableWaiter($restaurant_info_id)
    {
        $waiter = Waiter::where(Waiter::RESTAURANT_INFO_ID, $restaurant_info_id)
            ->where(Waiter::STATUS, 1)
            ->first();
        $waiter->STATUS = 0;
        $waiter->save();

        return $waiter->ID;
    }

    /**
     * Display the specified resource.
     * 显示指定订单信息的页面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 显示编辑指定订单的页面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @deprecated
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 在数据库中更新指定订单信息
     *
     * // TODO: 这个函数的逻辑还有待完善
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $orderId = $request->input('order_id');

        $details = $request->input('details');
        $resultArray = array();
        foreach ($details as $detail) {
            $result = array();
            $result['goods_id'] = $detail['goods_id'];
            $result['goods_name'] = Goods::find($detail['goods_id'])->NAME;
            $orderDetail = OrderDetail::where(OrderDetail::ORDERS_ID, $orderId)
                ->where(OrderDetail::GOODS_ID, $detail['goods_id'])
                ->first();

            $count = $detail['count'];
            if ($count > 0) {         //增加份数
                $orderDetail->QUANTITY += $count;
                $orderDetail->save();

                $result['result'] = 0;
            } elseif ($count < 0) {         //减少份数
                if ($orderDetail->STATUS == 0) {        //正常,尚未下锅...
                    // TODO: 需保证大于0
                    $orderDetail->QUANTITY += $count;
                    $orderDetail->save();

                    $result['result'] = 0;
                } else {
                    // TODO: 已经下锅, 不能退单
                    $result['result'] = 1;
                }
            }

            array_push($resultArray, $result);
        }

        $updateResult['update_result'] = $resultArray;
        $finalResult['code'] = 0;               // TODO: 此处不一定是0...
        $finalResult['msg'] = '接口调用成功';
        $finalResult['data'] = $updateResult;

        return response()->json($finalResult);
    }

    /**
     * Remove the specified resource from storage.
     * 在数据库中移除指定订单
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     * @deprecated
     */
    public function destroy($id)
    {
        //
    }
}
