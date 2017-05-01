<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Rating;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 用户评价控制器
 *
 * Class RatingController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的用户评价列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的用户评价的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的用户评价存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $ordersId = $request->header(Rating::ORDERS_ID);
        $generalRating = $request->header(Rating::GENERAL_RATING);
        $serviceRating = $request->header(Rating::SERVICE_RATING);
        $envRating = $request->header(Rating::ENV_RATING);
        $foodRating = $request->header(Rating::FOOD_RATING);
        $comment = $request->header(Rating::COMMENT);
        $recommend = $request->header(Rating::RECOMMEND);
        $commentPictures = $request->header(Rating::COMMENT_PICTURES);
        $status = $request->header(Rating::STATUS);

        if (empty($ordersId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $rating = new Rating();
        $rating->orders_id = $ordersId;
        $rating->general_rating = $generalRating;
        $rating->service_rating = $serviceRating;
        $rating->env_rating = $envRating;
        $rating->food_rating = $foodRating;
        $rating->comment = $comment;
        $rating->recommend = $recommend;
        $rating->comment_pictures = $commentPictures;
        $rating->status = $status;
        $rating->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定用户评价的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $rating = Rating::find($id);
        return response()->json($rating->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定用户评价的页面
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
     * 显示编辑指定用户评价的页面
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
     * 在数据库中更新指定用户评价
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
     * 在数据库中移除指定用户评价(可能只是隐藏)
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
