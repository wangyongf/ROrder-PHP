<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\App\Order\Order;
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
