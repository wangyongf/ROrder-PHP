<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\App\User\User;
use App\Utils\Common\ResponseUtils;
use App\Utils\Common\TokenUtils;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const DEFAULT_EXPIRE_INTERVAL = 3600;       //默认token有效时间为3600秒,也就是1小时

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
     * 实现用户使用手机号免注册登录
     * 如果用户尚未注册,则使用该手机号注册新用户
     * 如果用户已经注册过,则直接返回该用户信息
     *
     * @param Request $request
     * @param $mobile
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerFreeLogin(Request $request, $mobile)
    {
//        $deviceId = $request->header('X-Deviceid');
        if (empty($mobile)) {
            return ResponseUtils::nullJsonResponse('400', '客户端错误');
        }

        $user = User::where(User::MOBILE, $mobile)->first();
        if (empty($user)) {
            //注册新用户
            return $this->registerNewUser($request, $mobile);
        } else {
            //老用户

            $params = $user->UID . $user->PASSWORD;
            $token = TokenUtils::defaultToken($params);
            $refreshToken = TokenUtils::defaultRefreshToken($params);

            // TODO: 新建Token表,数据增删改查
//            $myToken = new Token();
//            $myToken->uid = $user->uid;
//            $myToken->deviceid = $request->header('X-Deviceid');
//            $myToken->token = $token;
//            $myToken->refresh_token = $refreshToken;
//            $myToken->expire_time = date('Y-m-d H:i:s',
//                self::DEFAULT_EXPIRE_INTERVAL + time());
//            $myToken->save();

            return response()->json([
                "code" => 0,
                "msg" => "接口调用成功",
                "data" => [
                    "uid" => $user->UID,
                    "mobile" => $mobile,
                    "nickname" => $user->NICKNAME,
                    "signature" => $user->SIGNATURE,
                    "sex" => $user->SEX,
                    "birthday" => $user->BIRTHDAY,
                    "realname" => $user->REALNAME,
                    "email" => $user->EMAIL,
                    "user_avatar" => $user->HEAD_PORTRAIT,
                    "token" => $token,
                    "refresh_token" => $refreshToken
                ]
            ]);
        }
    }

    /**
     * 直接根据手机号注册新用户
     *
     * @param Request $request
     * @param $mobile
     * @return \Illuminate\Http\JsonResponse
     */
    private function registerNewUser(Request $request, $mobile)
    {
        $user = new User();
        $user->UID = User::all()->count() + 1;
        $user->MOBILE = $mobile;
        $user->NICKNAME = "用户" . (User::all()->count() + 1);
        $user->SIGNATURE = '哪有什么岁月静好,不过是有人替你负重前行';
        $user->LAST_LOGIN_IP = $request->getClientIp();
        $user->LAST_LOGIN_DATE = date("Y-m-d h:i:s");
        $user->HEAD_PORTRAIT = "http://1234.qiniuyun.com/image.png";
        $user->save();

        $params = $user->UID . $user->PASSWORD;
        $token = TokenUtils::defaultToken($params);
        $refreshToken = TokenUtils::defaultRefreshToken($params);

        // TODO: 新建Token表,数据增删改查
//        $myToken = new Token();
//        $myToken->uid = $user->uid;
//        $myToken->deviceid = $request->header('X-Deviceid');
//        $myToken->token = $token;
//        $myToken->refresh_token = $refreshToken;
//        $myToken->expire_time = date('Y-m-d H:i:s',
//            self::DEFAULT_EXPIRE_INTERVAL + time());
//        $myToken->save();

        return response()->json([
            "code" => 0,
            "msg" => "接口调用成功",
            "data" => [
                "uid" => $user->UID,
                "mobile" => $mobile,
                "nickname" => $user->NICKNAME,
                "signature" => $user->SIGNATURE,
                "sex" => $user->SEX,
                "birthday" => $user->BIRTHDAY,
                "realname" => $user->REALNAME,
                "email" => $user->EMAIL,
                "user_avatar" => $user->HEAD_PORTRAIT,
                "token" => $token,
                "refresh_token" => $refreshToken
            ]
        ]);
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
