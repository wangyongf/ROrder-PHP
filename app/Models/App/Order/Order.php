<?php

namespace App\Models\App\Order;

use App\Models\BaseModel;

/**
 * 订单表
 *
 * Class Order
 * @package App\Models\App
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Order extends BaseModel
{
    const TABLE_NAME = 'T_ORDERS';
    const ID = 'id';
    const WAITERS_ID = 'waiters_id';
    const TOTAL_PRICE = 'total_price';
    const NOTES = 'notes';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const STATUS = 'status';
    const TABLES_ID = 'tables_id';
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
