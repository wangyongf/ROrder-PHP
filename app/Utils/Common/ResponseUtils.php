<?php

namespace App\Utils\Common;

/**
 * 响应相关的工具类
 *
 * Class ResponseUtils
 * @package App\Utils\Common
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class ResponseUtils
{
    /**
     * 生成ROrder-PHP的空json响应
     *
     * @param $code
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function nullJsonResponse($code, $msg)
    {
        return response()->json([
            'code' => $code,
            'msg' => $msg,
            'data' => null
        ]);
    }

    /**
     * 生成简单的请求成功响应
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function simpleSuccessJsonResponse()
    {
        return response()->json([
            'code' => 0,
            'msg' => '请求成功',
            'data' => null
        ]);
    }
}