<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Cook;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 餐厅厨师表
 *
 * Class CookController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class CookController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的餐厅厨师列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的餐厅厨师的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.store_cook');
    }

    /**
     * Store a newly created resource in storage.
     * 将新的餐厅厨师存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Cook::all()->count() + 1;
//        $cooks_id = $request->header(Cook::COOKS_ID);
        $restaurant_info_id = $request->header(Cook::RESTAURANT_INFO_ID);
        $title = $request->header(Cook::TITLE);
        $status = $request->header(Cook::STATUS);
        $name = $request->header(Cook::NAME);
        $sex = $request->header(Cook::SEX);
        $birthday = $request->header(Cook::BIRTHDAY);
        $pictures = $request->header(Cook::PICTURES);

//        if (empty($cooks_id)) {
//            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
//        }

        // TODO: checkHeader--middleware

        $cook = new Cook();
        $cook->id = $id;
        $cook->cooks_id = $request->input('cook-id');
        $cook->restaurant_info_id = $request->input('restaurant-info-id');
        $cook->title = $request->input('title');
        $cook->status = 1;
        $cook->name = $request->input('name');
        $cook->sex = 1;
        $cook->birthday = $request->input('birthday');
        $cook->pictures = null;
        $cook->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定餐厅厨师的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $cook = Cook::find($id);
        return response()->json($cook->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定餐厅厨师信息的页面
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
     * 显示编辑指定餐厅厨师信息的页面
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
     * 在数据库中更新指定厨师的信息
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
     * 在数据库中移除指定餐厅厨师
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
