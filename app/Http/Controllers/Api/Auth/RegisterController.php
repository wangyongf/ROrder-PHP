<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\App\User;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 注册控制器
 *
 * Class RegisterController
 * @package App\Http\Controllers\App\Auth
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class RegisterController extends Controller
{

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {

    }

    /**
     * 注册新用户
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        if (!$this->validateRegister($request)) {
            return response()->json([
                'code' => 1002,
                'msg' => '请求参数错误',
                'data' => null
            ]);
        }

        $nickname = $request->input('nickname');
        $email = $request->input('email');
        $password = $request->input('password');

        $hasNickname = !empty(User::where('nickname', $nickname)->first());
        if ($hasNickname) {
            return response()->json([
                'code' => 1000,
                'msg' => '昵称重复',
                'data' => null
            ]);
        }

        $hasEmail = !empty(User::where('email', $email)->first());
        if ($hasEmail) {
            return response()->json([
                'code' => 1001,
                'msg' => '邮箱重复',
                'data' => null
            ]);
        }

        //验证通过,创建新用户
        $newUid = $this->createNewUser($nickname, $email, $password);
        if (!empty($newUid)) {
            return response()->json([
                'code' => 0,
                'msg' => '注册新用户成功',
                'data' => [
                    'uid' => $newUid,
                    'email' => $email,
                    'nickname' => $nickname,
                    //TODO: 增加token字段和refreshToken字段?
                ]
            ]);
        } else {
            return ResponseUtils::nullJsonResponse('1003', '未知错误,请稍后再试');
        }
    }

    /**
     * 检查请求头,减少非法请求
     *
     * @param Request $request
     * @return bool
     */
    private function validateRegister(Request $request)
    {
        $nickname = $request->input('nickname');
        $email = $request->input('email');
        $password = $request->input('password');
        $deviceId = $request->input('X-Deviceid');
        $token = $request->input('token');

        return !empty($deviceId) && !empty($nickname) && !empty($email)
            && !empty($password) && !empty($token) &&
            $token == md5($nickname . $email . $password . $deviceId);
    }

    /**
     * 创建新用户
     *
     * @param $nickname
     * @param $email
     * @param $password
     * @return string 新用户的UID
     */
    private function createNewUser($nickname, $email, $password)
    {
        $count = User::all()->count();
        $limit = 20;
        $newUid = $this->generateUID($limit, $count + 1);
        if (!empty($newUid)) {
            $user = new User();
            $user->uid = $newUid;
            $user->nickname = $nickname;
            $user->email = $email;
            $user->password = $password;
            $user->save();
        }

        return $newUid;
    }

    /**
     * 目前是生成递增的UID
     * TODO: 生成随机UID?
     *
     * @param int $length
     * @param $newUid
     * @return string newUid数字长度在1-20之内,补零,否则返回空
     */
    private function generateUID($limit, $newUid)
    {
        $uid = '';
        $length = strlen($newUid);
        if ($length > 0 && $length <= $limit) {
            for ($i = 0; $i < $limit - $length; $i++) {
                $uid .= '0';
            }
            $uid .= $newUid;
        }

        return $uid;
    }
}
