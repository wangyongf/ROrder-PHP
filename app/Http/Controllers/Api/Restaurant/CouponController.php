<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\App\Restaurant\Coupon;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 餐厅优惠券表
 *
 * Class CouponController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的优惠券列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的优惠券的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的优惠券存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = Coupon::all()->count() + 1;
        $coupon_id = $request->header(Coupon::COUPON_ID);
        $status = $request->header(Coupon::STATUS);
        $restaurant_info_id = $request->header(Coupon::RESTAURANT_INFO_ID);
        $quantity = $request->header(Coupon::QUANTITY);
        $available_quantity = $request->header(Coupon::AVAILABLE_QUANTITY);
        $scope = $request->header(Coupon::SCOPE);
        $description = $request->header(Coupon::DESCRIPTION);
        $type = $request->header(Coupon::TYPE);
        $par_value = $request->header(Coupon::PAR_VALUE);
        $start_time = $request->header(Coupon::START_TIME);
        $end_time = $request->header(Coupon::END_TIME);
        $creator_id = $request->header(Coupon::CREATOR_ID);

        if (empty($coupon_id)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $coupon = new Coupon();
        $coupon->id = $id;
        $coupon->coupon_id = $coupon_id;
        $coupon->status = $status;
        $coupon->restaurant_info_id = $restaurant_info_id;
        $coupon->quantity = $quantity;
        $coupon->available_quantity = $available_quantity;
        $coupon->scope = $scope;
        $coupon->description = $description;
        $coupon->type = $type;
        $coupon->par_value = $par_value;
        $coupon->start_time = $start_time;
        $coupon->end_time = $end_time;
        $coupon->creator_id = $creator_id;
        $coupon->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定优惠券的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $coupon = Coupon::find($id);
        return response()->json($coupon->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定优惠券信息的页面
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
     * 显示编辑指定优惠券信息的页面
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
     * 在数据库中更新指定优惠券的信息
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
