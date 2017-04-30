<?php

namespace App\Models\App;

use App\Models\BaseModel;

/**
 * 顾客信息表
 *
 * Class User
 * @package App\Models\App
 *
 * @author      Scott Wang
 * @version     1.0
 * @since         ROrder-PHP 0.1
 */
class User extends BaseModel
{
    const TABLE_NAME = 'T_USER_INFO';               //表名
    const UID = 'uid';                              //UID
    const MOBILE = 'mobile';
    const NICKNAME = 'nickname';
    const PASSWORD = 'password';
    const SIGNATURE = 'signature';
    const SEX = 'sex';
    const BIRTHDAY = 'birthday';
    const LAST_LOGIN_IP = 'last_login_ip';
    const LAST_LOGIN_DATE = 'last_login_date';
    const REALNAME = 'realname';
    const EMAIL = 'email';
    const HEAD_PORTRAIT = 'head_portrait';
    /**
     * 非自增主键
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;
    /**
     * 主键
     *
     * @var string
     */
    protected $primaryKey = self::UID;


}
