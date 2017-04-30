<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\GoodsCategory;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 餐厅商品(菜品)分类表
 *
 * Class GoodsCategoryController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class GoodsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的商品分类列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的商品分类的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的商品分类存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = GoodsCategory::all()->count() + 1;
        $categoryId = $request->header(GoodsCategory::CATEGORY_ID);
        $restaurantInfoId = $request->header(GoodsCategory::RESTAURANT_INFO_ID);
        $name = $request->header(GoodsCategory::NAME);
        $parentId = $request->header(GoodsCategory::PARENT_ID);

        if (empty($categoryId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $goodCategory = new GoodsCategory();
        $goodCategory->id = $id;
        $goodCategory->category_id = $categoryId;
        $goodCategory->restaurant_info_id = $restaurantInfoId;
        $goodCategory->name = $name;
        $goodCategory->parent_id = $parentId;
        $goodCategory->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定商品分类的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $goodsCategory = GoodsCategory::find($id);
        return response()->json($goodsCategory->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定商品分类信息的页面
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
     * 显示编辑指定商品分类的页面
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
     * 在数据库中更新指定商品分类的信息
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
     * 在数据库中移除指定优惠券
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
