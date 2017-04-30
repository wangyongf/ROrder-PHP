<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\App\Waiter;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Waiter::all()->count();
        $waiter_id = $request->input(Waiter::WAITER_ID);
        $restaurant_info_id = $request->input(Waiter::RESTAURANT_INFO_ID);
        $status = $request->input(Waiter::STATUS);
        $name = $request->input(Waiter::NAME);
        $orders_id = $request->input(Waiter::ORDERS_ID);
        $sex = $request->input(Waiter::SEX);
        $birthday = $request->input(Waiter::BIRTHDAY);
        $pictures = $request->input(Waiter::PICTURES);
        $title = $request->input(Waiter::TITLE);

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
     * 显示指定服务员的页面
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
