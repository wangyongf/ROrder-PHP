<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Goods;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 商品(菜品)控制器
 *
 * Class GoodsController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的商品列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的商品的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.store_goods');
    }

    /**
     * Store a newly created resource in storage.
     * 将新的商品存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Goods::all()->count() + 1;
        $goodsId = $request->header(Goods::GOODS_ID);
        $name = $request->header(Goods::NAME);
        $originalPrice = $request->header(Goods::ORIGINAL_PRICE);
        $realPrice = $request->header(Goods::REAL_PRICE);
        $restaurantInfoId = $request->header(Goods::RESTAURANT_INFO_ID);
        $description = $request->header(Goods::DESCRIPTION);
        $available = $request->header(Goods::AVAILABLE);
        $pictures = $request->header(Goods::PICTURES);
        $goodsCategoriesId = $request->header(Goods::GOODS_CATEGORIES_ID);

//        if (empty($goodsId)) {
//            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
//        }

        // TODO: checkHeader--middleware

        $goods = new Goods();
        $goods->ID = $id;
        $goods->GOODS_ID = $request->input('goods-id');
        $goods->NAME = $request->input('name');
        $goods->ORIGINAL_PRICE = $request->input('original-price');
        $goods->REAL_PRICE = $request->input('real-price');
        $goods->RESTAURANT_INFO_ID = $request->input('restaurant-info-id');
        $goods->DESCRIPTION = $request->input('description');
        $goods->AVAILABLE = 1;
        $goods->PICTURES = null;
        $goods->GOODS_CATEGORIES_ID = $request->input('goods-category-id');
        $goods->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定商品的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $goods = Goods::find($id);
        return response()->json($goods->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定商品信息的页面
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
     * 显示编辑指定商品信息的页面
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
     * 在数据库中更新指定商品的信息
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
     * 在数据库中移除指定商品
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
