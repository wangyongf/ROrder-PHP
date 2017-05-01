<?php

namespace App\Models\App\Order;

use App\Models\BaseModel;

/**
 * 订单操作记录表
 *
 * Class OrderActivityRecord
 * @package App\Models\App\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class OrderActivityRecord extends BaseModel
{
    const TABLE_NAME = 'T_ORDER_ACTIVITY_RECORD';
    const ID = 'id';
    const ORDERS_ID = 'orders_id';
    const ACTIVITY = 'activity';                //对订单的操作(枚举)：n            0新增，1追加，2部分退单，3其它

    /**
     * 自增主键
     *
     * @var bool
     */
    public $incrementing = true;

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
