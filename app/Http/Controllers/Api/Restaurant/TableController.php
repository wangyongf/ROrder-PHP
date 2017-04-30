<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Models\App\Restaurant\Table;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 餐厅餐桌控制器
 *
 * Class TableController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的餐桌列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的餐桌的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的餐桌存储到数据库
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Table::all()->count() + 1;
        $table_id = $request->header(Table::TABLE_ID);
        $capacity = $request->header(Table::CAPACITY);
        $boxes_id = $request->header(Table::BOXES_ID);
        $status = $request->header(Table::STATUS);
        $orders_id = $request->header(Table::ORDERS_ID);

        if (empty($table_id)) {
            return ResponseUtils::nullJsonResponse('400', '客户端请求错误');
        }

        // TODO: checkHeader--middleware

        $table = new Table();
        $table->id = $id;
        $table->table_id = $table_id;
        $table->capacity = $capacity;
        $table->boxes_id = $boxes_id;
        $table->status = $status;
        $table->orders_id = $orders_id;
        $table->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定餐桌的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $table = Table::find($id);
        return response()->json($table->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定餐桌信息的页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 显示编辑指定餐桌信息的页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 在数据库中更新指定餐桌的信息
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 在数据库中移除指定餐桌
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
