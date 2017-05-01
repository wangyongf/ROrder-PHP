<?php

namespace App\Models\App\User;

use App\Models\BaseModel;

/**
 * 优惠券用户关联表
 *
 * Class UserCoupon
 * @package App\Models\App\User
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class UserCoupon extends BaseModel
{
    const TABLE_NAME = 'T_USER_COUPONS';
    const ID = 'id';
    const COUPONS_ID = 'coupons_id';
    const RECEIVE_TIME = 'receive_time';
    const RECEIVE_STATUS = 'receive_status';
    const USER_INFO_UID = 'user_info_uid';

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
    protected $primaryKey = self::ID;
}
