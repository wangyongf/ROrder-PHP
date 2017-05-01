<?php

namespace App\Models\App\Order;

use App\Models\BaseModel;

/**
 * 交易流水(记录)表
 *
 * Class Transaction
 * @package App\Models\App\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Transaction extends BaseModel
{
    const TABLE_NAME = 'T_TRANSACTIONS';
    const ID = 'id';
    const GOODS_ID = 'goods_id';
    const GOODS_NAME = 'goods_name';
    const ORDERS_ID = 'orders_id';
    const QUANTITY = 'quantity';

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
