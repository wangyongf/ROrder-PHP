<?php

namespace App\Http\Controllers\App\Auth;

use App\Http\Controllers\Controller;
use App\Models\App\User;
use App\Utils\Common\CommonUtils;
use App\Utils\Common\StringUtils;
use Illuminate\Http\Request;

/**
 * 登录控制器
 *
 * Class LoginController
 * @package App\Http\Controllers\App\Auth
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class LoginController extends Controller
{
    /**
     * 登录类型
     *
     * @var array
     */
    private $loginTypeMap = array(
        'email' => User::EMAIL,                //邮箱登录
        'nickname' => User::NICKNAME          //用户名登录
    );

    /**
     * LoginController constructor.
     */
    function __construct()
    {

    }

    /**
     * 用户登录
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (!$this->validateLogin($request)) {
            return CommonUtils::nullJsonResponse(2002,
                '请求参数错误');
        }

        $account = $request->input('account');
        $password = $request->input('password');
        if (StringUtils::isEmail($account)) {
            return $this->loginWithEmail($account, $password);
        } else {
            return $this->loginWithNickname($account, $password);
        }
    }

    /**
     * 检查请求头,减少非法请求
     *
     * @param Request $request
     * @return bool
     */
    private function validateLogin(Request $request)
    {
        $account = $request->input('account');
        $password = $request->input('password');
        $deviceId = $request->input('X-Deviceid');
        $token = $request->input('token');

        return !empty($deviceId) && !empty($account) && !empty($password)
            && !empty($token) && $token == md5($account . $password . $deviceId);
    }

    /**
     * 使用邮箱登录
     *
     * @param $email
     * @param $password
     * @return \Illuminate\Http\JsonResponse
     */
    private function loginWithEmail($email, $password)
    {
        return $this->performLogin('email', $email, $password);
    }

    /**
     * 使用用户名登录
     *
     * @param $nickname
     * @param $password
     * @return \Illuminate\Http\JsonResponse
     */
    private function loginWithNickname($nickname, $password)
    {
        return $this->performLogin('nickname', $nickname, $password);
    }

    /**
     * 真正地执行登录
     *
     * @param $loginType
     * @param $account
     * @param $password
     * @return \Illuminate\Http\JsonResponse
     */
    private function performLogin($loginType, $account, $password)
    {
        $columnName = $this->loginTypeMap[$loginType];
        $user = User::where($columnName, $account)->first();
        if (empty($user)) {                             //账号不存在
            return CommonUtils::nullJsonResponse(2001,
                '账号不存在');
        } else {
            if ($user->password == $password) {             //登录成功
                $token = CommonUtils::token();
                //更新token字段
                $user->token = $token;
                $user->save();

                return response()->json([
                    'code' => 0,
                    'msg' => '登录成功',
                    'data' => [
                        'token' => $token
                    ]
                ]);
            } else {                //账号|密码错误
                return CommonUtils::nullJsonResponse(2000,
                    '账号或密码错误');
            }
        }
    }
}
