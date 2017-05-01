<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\App\Order\OrderDetail;
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $orderDetail = OrderDetail::find($id);
        return response()->json($orderDetail->toArray());
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
