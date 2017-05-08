<?php

namespace App\Models\App\Order;

use App\Models\BaseModel;

/**
 * 订单详情表
 *
 * Class OrderDetail
 * @package App\Models\App\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class OrderDetail extends BaseModel
{
    const TABLE_NAME = 'T_ORDER_DETAILS';
    const ID = 'id';
    const ORDERS_ID = 'orders_id';
    const GOODS_ID = 'goods_id';
    const STATUS = 'status';
    const QUANTITY = 'quantity';

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

    /**
     * 允许更新的字段
     * @var array
     */
    protected $fillable = ['id', 'orders_id', 'goods_id', 'status', 'quantity',
        'created_at', 'updated_at'];
}
