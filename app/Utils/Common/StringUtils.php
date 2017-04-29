<?php

namespace App\Utils\Common;

/**
 * 字符串相关的工具类
 *
 * Class StringUtils
 * @package App\Utils\Common
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class StringUtils
{
    /**
     * 判断字符串是否电子邮箱
     *
     * @param $str
     * @return mixed true-是,false-否
     */
    public static function isEmail($str)
    {
        return filter_var($str, FILTER_VALIDATE_EMAIL);
    }
}