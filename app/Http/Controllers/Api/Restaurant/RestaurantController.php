<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Restaurant;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的餐厅列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的餐厅的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新创建的餐厅存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $restaurant_id = $request->input(Restaurant::RESTAURANT_ID);
        $name = $request->input(Restaurant::NAME);
        $description = $request->input(Restaurant::DESCRIPTION);
        $address = $request->input(Restaurant::ADDRESS);

        if (empty($restaurant_id)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $restaurant = new Restaurant();
        $restaurant->restaurant_id = $restaurant_id;
        $restaurant->name = $name;
        $restaurant->description = $description;
        $restaurant->address = $address;
        $restaurant->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定餐厅的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $restaurant = Restaurant::find($id);
        return response()->json($restaurant->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定餐厅的页面
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
     * 显示编辑指定餐厅的页面
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
     * 在数据库中更新指定餐厅
     *
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
     * 从数据库中移除指定餐厅
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
