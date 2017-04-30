<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Waiter;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

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