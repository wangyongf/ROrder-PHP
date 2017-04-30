<?php

namespace App\Utils\Common;

/**
 * 通用工具类
 *
 * Class CommonUtils
 * @package App\Utils\Common
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class CommonUtils
{
    /**
     * 生成ROrder-PHP的空json响应
     * // TODO: 干掉CommonUtils里面的这个方法
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
     * 检查index是否在数组的索引范围之内
     *
     * @param $index
     * @param array $array
     * @return bool true-在范围之内,false-不在范围之内
     */
    public static function checkIndex($index, $array = array())
    {
        return $index >= 0 && $index < count($array);
    }

    /**
     * csrf_token+当前时间的MD5值
     *
     * @return string
     */
    public static function token()
    {
        return md5(csrf_token() . time());
    }
}