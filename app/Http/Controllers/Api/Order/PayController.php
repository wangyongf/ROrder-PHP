<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\App\Order\Pay;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 支付流水控制器
 *
 * Class PayController
 * @package App\Http\Controllers\Api\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的支付流水列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的支付流水的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的支付流水信息存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Pay::all()->count() + 1;
        $payId = $request->header(Pay::PAY_ID);
        $ordersId = $request->header(Pay::ORDERS_ID);
        $payDate = $request->header(Pay::PAY_DATE);
        $payWay = $request->header(Pay::PAY_WAY);
        $payStatus = $request->header(Pay::PAY_STATUS);

        if (empty($payId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $pay = new Pay();
        $pay->id = $id;
        $pay->pay_id = $payId;
        $pay->orders_id = $ordersId;
        $pay->pay_date = $payDate;
        $pay->pay_way = $payWay;
        $pay->pay_status = $payStatus;
        $pay->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定支付流水的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $pay = Pay::find($id);
        return response()->json($pay->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定支付流水信息的页面
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
     * 显示编辑指定支付流水信息的页面
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
     * 在数据库中更新指定支付流水信息
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
     * 在数据库中移除指定支付流水
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
