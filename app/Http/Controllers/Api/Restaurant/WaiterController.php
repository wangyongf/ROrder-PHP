<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Order\Order;
use App\Models\App\Order\OrderDetail;
use App\Models\App\Restaurant\Goods;
use App\Models\App\Restaurant\Waiter;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 服务员控制器
 *
 * Class WaiterController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class WaiterController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的服务员列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的服务员的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新创建的服务员存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Waiter::all()->count() + 1;
        $waiter_id = $request->header(Waiter::WAITER_ID);
        $restaurant_info_id = $request->header(Waiter::RESTAURANT_INFO_ID);
        $status = $request->header(Waiter::STATUS);
        $name = $request->header(Waiter::NAME);
        $orders_id = $request->header(Waiter::ORDERS_ID);
        $sex = $request->header(Waiter::SEX);
        $birthday = $request->header(Waiter::BIRTHDAY);
        $pictures = $request->header(Waiter::PICTURES);
        $title = $request->header(Waiter::TITLE);

        if (empty($waiter_id)) {
            return ResponseUtils::nullJsonResponse('400', '客户端请求错误');
        }

        // TODO: checkHeader--middleware

        $waiter = new Waiter();
        $waiter->id = $id;
        $waiter->waiter_id = $waiter_id;
        $waiter->restaurant_info_id = $restaurant_info_id;
        $waiter->status = $status;
        $waiter->name = $name;
        $waiter->orders_id = $orders_id;
        $waiter->sex = $sex;
        $waiter->birthday = $birthday;
        $waiter->pictures = $pictures;
        $waiter->title = $title;
        $waiter->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定服务员的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $waiter = Waiter::find($id);
        return response()->json($waiter->toArray());
    }

    /**
     * 服务员端获取自己的订单信息
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function order(Request $request, $id)
    {
        // TODO: 目前只考虑一个服务员应付一个订单的情况

        $order = Order::where(Order::WAITERS_ID, $id)->first();
        $details = OrderDetail::where(OrderDetail::ORDERS_ID, $order->ID)->get();

        $detailsArray = array();
        foreach ($details as $detail) {
            $detailArray = array();
            $goodsRawId = $detail->GOODS_ID;
            $goods = Goods::find($goodsRawId);

            $detailArray['goods_raw_id'] = $goods->ID;
            $detailArray['goods_id'] = $goods->GOODS_ID;
            $detailArray['name'] = $goods->NAME;
            $detailArray['original_price'] = $goods->ORIGINAL_PRICE;
            $detailArray['real_price'] = $goods->REAL_PRICE;
            $detailArray['pictures'] = $goods->PICTURES;
            $detailArray['status'] = $detail->STATUS;
            $detailArray['quantity'] = $detail->QUANTITY;

            array_push($detailsArray, $detailArray);
        }

        $orderData = array();
        $orderData['orders_raw_id'] = $order->ID;
        $orderData['orders_id'] = $order->ORDERS_ID;
        $orderData['notes'] = $order->NOTES;
        $orderData['status'] = $order->STATUS;
        $orderData['tables_id'] = $order->TABLES_ID;
        $orderData['user_info_uid'] = $order->USER_INFO_UID;
        $orderData['details'] = $detailsArray;

        $result = array();
        $result['code'] = 0;
        $result['msg'] = '接口调用成功';
        $result['data'] = $orderData;

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     * 显示指定服务员信息的页面
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
     * 显示编辑指定服务员信息的页面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 在数据库中更新指定服务员信息
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 在数据库中移除指定服务员
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
