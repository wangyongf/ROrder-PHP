<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\App\User\UserCoupon;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 优惠券用户关联表
 *
 * Class UserCouponController
 * @package App\Http\Controllers\Api\User
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class UserCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的优惠券用户领取情况的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的用户领取优惠券的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的用户领取优惠券信息存储到数据库中
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = UserCoupon::all()->count() + 1;
        $couponsId = $request->header(UserCoupon::COUPONS_ID);
        $receiveTime = $request->header(UserCoupon::RECEIVE_TIME);
        $receiveStatus = $request->header(UserCoupon::RECEIVE_STATUS);
        $userInfoUid = $request->header(UserCoupon::USER_INFO_UID);

        if (empty($couponsId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $userCoupon = new UserCoupon();
        $userCoupon->id = $id;
        $userCoupon->coupons_id = $couponsId;
        $userCoupon->receive_time = $receiveTime;
        $userCoupon->receive_status = $receiveStatus;
        $userCoupon->user_info_uid = $userInfoUid;
        $userCoupon->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定(用户领取优惠券条目)的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $userCoupon = UserCoupon::find($id);
        return response()->json($userCoupon->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定用户领取优惠券情况的页面
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
     * 显示编辑指定(用户领取某个优惠券)信息的页面
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
     * 在数据库中更新指定(用户领取某个优惠券)的信息
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
     * 在数据库中移除指定(用户领取某个优惠券)的信息
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
