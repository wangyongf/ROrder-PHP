<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 餐厅优惠券表
 *
 * Class Coupon
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Coupon extends BaseModel
{
    const TABLE_NAME = 'T_COUPONS';
    const ID = 'id';
    const COUPON_ID = 'coupon_id';
    const STATUS = 'status';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const QUANTITY = 'quantity';
    const AVAILABLE_QUANTITY = 'available_quantity';
    const SCOPE = 'scope';
    const DESCRIPTION = 'description';
    const TYPE = 'type';
    const PAR_VALUE = 'par_value';
    const START_TIME = 'start_time';
    const END_TIME = 'end_time';
    const CREATOR_ID = 'creator_id';

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
