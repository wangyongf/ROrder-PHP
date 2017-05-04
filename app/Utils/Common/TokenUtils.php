<?php

namespace app\Utils\Common;

/**
 * description
 *
 * Class TokenUtils
 * @package app\Utils\Common
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class TokenUtils
{
    /**
     * 生成默认格式的token
     *
     * @param $params
     * @return string 32位的token
     */
    public static function defaultToken($params)
    {
        // TODO: 暂时用SHA1算法进行加密
        $token = md5($params . date('Y-m-d H:i:s', time()));
        return $token;
    }

    /**
     * 生成默认格式的refresh_token
     *
     * @param $params
     * @return string 32位的refresh_token
     */
    public static function defaultRefreshToken($params)
    {
        $REFRESH_TOKEN = 'refresh_token';
        $refreshToken = self::defaultSaltToken($params, $REFRESH_TOKEN);
        return $refreshToken;
    }

    /**
     * 生成加盐的token
     * salt-盐
     *
     * @param $params
     * @param $salt
     * @return string 32位的token
     */
    public static function defaultSaltToken($params, $salt)
    {
        $token = md5($params . date('Y-m-d H:i:s', time()) . $salt);
        return $token;
    }
}