<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\App\Order\Transaction;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 交易流水(记录)表
 *
 * Class TransactionController
 * @package App\Http\Controllers\Api\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的交易流水列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的交易流水的页面
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
     * 将新的交易流水信息存储到数据库中
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Transaction::all()->count() + 1;
        $goodsId = $request->header(Transaction::GOODS_ID);
        $goodsName = $request->header(Transaction::GOODS_NAME);
        $ordersId = $request->header(Transaction::ORDERS_ID);
        $quantity = $request->header(Transaction::QUANTITY);

        if (empty($goodsId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $transaction = new Transaction();
        $transaction->id = $id;
        $transaction->goods_id = $goodsId;
        $transaction->goods_name = $goodsName;
        $transaction->orders_id = $ordersId;
        $transaction->quantity = $quantity;
        $transaction->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定交易流水的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $transaction = Transaction::find($id);
        return response()->json($transaction->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定交易流水信息的页面
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
     * 显示编辑指定交易流水信息的页面
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
     * 在数据库中更新指定交易流水的信息
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
     * 在数据库中移除指定交易流水
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
