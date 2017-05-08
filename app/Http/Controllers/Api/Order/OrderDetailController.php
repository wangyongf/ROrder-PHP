<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\App\Order\DishSchedule;
use App\Models\App\Order\OrderDetail;
use App\Models\App\Restaurant\Goods;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 订单详情表
 *
 * Class OrderDetailController
 * @package App\Http\Controllers\Api\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的订单详情列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的订单详情的页面
     *
     * @return \Illuminate\Http\Response
     *
     * @deprecated
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的订单详情信息存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = OrderDetail::all()->count() + 1;
        $ordersId = $request->header(OrderDetail::ORDERS_ID);
        $goodsId = $request->header(OrderDetail::GOODS_ID);
        $status = $request->header(OrderDetail::STATUS);
        $quantity = $request->header(OrderDetail::QUANTITY);

        if (empty($ordersId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $orderDetail = new OrderDetail();
        $orderDetail->id = $id;
        $orderDetail->orders_id = $ordersId;
        $orderDetail->goods_id = $goodsId;
        $orderDetail->status = $status;
        $orderDetail->quantity = $quantity;
        $orderDetail->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定订单详情的信息(json)
     *
     * @param $orderDetailId
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($orderDetailId)
    {
        $result = array();
        $data = array();

        $orderDetail = OrderDetail::find($orderDetailId);
        $orderId = $orderDetail->ORDERS_ID;

        $goodsId = $orderDetail->GOODS_ID;
        $goods = Goods::find($goodsId);
        $data['goods_raw_id'] = $goodsId;
        $data['goods_id'] = $goods->GOODS_ID;
        $data['name'] = $goods->NAME;
        $data['original_price'] = $goods->ORIGINAL_PRICE;
        $data['real_price'] = $goods->REAL_PRICE;
        // TODO: COVER
//        $data['cover'] = $goods->COVER;
        $data['cover'] = 'http://www.baidu.com';
        $data['pictures'] = $goods->PICTURES;

        $dishSchedule = DishSchedule::where(DishSchedule::ORDER_DETAILS_ID, $orderDetailId)->first();
        $data['status'] = $dishSchedule->SCHEDULE;

        $data['quantity'] = $orderDetail->QUANTITY;
        $data['order_raw_id'] = $orderId;
        // TODO: order_raw_id&order_id
        $data['order_id'] = $orderId;
        $data['created_at'] = $orderDetail->CREATED_AT;
        $data['updated_at'] = $orderDetail->UPDATED_AT;

        $result['code'] = 0;
        $result['msg'] = '接口调用成功';
        $result['data'] = $data;

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     * 显示指定订单详情信息的页面
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
     * 显示编辑指定订单详情信息的页面
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
     * 在数据库中更新指定订单详情信息
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
     * 在数据库中移除指定订单详情
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
