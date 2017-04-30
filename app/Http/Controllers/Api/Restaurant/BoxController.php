<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Box;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 餐厅房间控制器
 *
 * Class BoxController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的餐厅房间列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的餐厅房间的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的餐厅房间存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Box::all()->count() + 1;
        $box_id = $request->header(Box::BOX_ID);
        $name = $request->header(Box::NAME);
        $restaurant_info_id = $request->header(Box::RESTAURANT_INFO_ID);
        $capacity = $request->header(Box::CAPACITY);
        $total_table_count = $request->header(Box::TOTAL_TABLE_COUNT);
        $available_table_count = $request->header(Box::AVAILABLE_TABLE_COUNT);
        $box_type = $request->header(Box::BOX_TYPE);
        $status = $request->header(Box::STATUS);
        $pictures = $request->header(Box::PICTURES);
        $description = $request->header(Box::DESCRIPTION);

        if (empty($box_id)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $box = new Box();
        $box->id = $id;
        $box->box_id = $box_id;
        $box->name = $name;
        $box->restaurant_info_id = $restaurant_info_id;
        $box->capacity = $capacity;
        $box->total_table_count = $total_table_count;
        $box->available_table_count = $available_table_count;
        $box->box_type = $box_type;
        $box->status = $status;
        $box->pictures = $pictures;
        $box->description = $description;
        $box->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定餐厅房间的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $box = Box::find($id);
        return response()->json($box->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定餐厅房间信息的页面
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
     * 显示编辑指定餐厅房间信息的页面
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
     * 在数据库中更新指定餐桌的信息
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
     * 在数据库中移除指定餐厅房间
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
