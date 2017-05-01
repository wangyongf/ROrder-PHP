<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\App\User\User;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的用户列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的用户的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新创建的用户存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $uid = $request->header(User::UID);
        $mobile = $request->header(User::MOBILE);
        $nickname = $request->header(User::NICKNAME);
        $password = $request->header(User::PASSWORD);
        $signature = $request->header(User::SIGNATURE);
        $sex = $request->header(User::SEX);
        $birthday = $request->header(User::BIRTHDAY);
        $last_login_ip = $request->header(User::LAST_LOGIN_IP);
        $last_login_date = $request->header(User::LAST_LOGIN_DATE);
        $realname = $request->header(User::REALNAME);
        $email = $request->header(User::EMAIL);
        $head_portrait = $request->header(User::HEAD_PORTRAIT);

        if (empty($uid)) {
            return ResponseUtils::nullJsonResponse('400', '客户端请求错误');
        }

        // TODO: checkHeader--middleware

        $user = new User();
        $user->uid = $uid;
        $user->mobile = $mobile;
        $user->nickname = $nickname;
        $user->password = $password;
        $user->signature = $signature;
        $user->sex = $sex;
        $user->birthday = $birthday;
        $user->last_login_ip = $last_login_ip;
        $user->last_login_date = $last_login_date;
        $user->realname = $realname;
        $user->email = $email;
        $user->head_portrait = $head_portrait;
        $user->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定用户的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $user = User::find($id);
        return response()->json($user->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定用户的页面
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
     * 显示编辑指定用户信息的页面
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
     * 在数据库中更新指定用户的信息
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
     * 在数据库中移除指定用户
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
