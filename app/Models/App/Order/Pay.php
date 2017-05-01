<?php

namespace App\Models\App\Order;

use App\Models\BaseModel;

/**
 * 支付流水表
 *
 * Class Pay
 * @package App\Models\App\Order
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Pay extends BaseModel
{
    const TABLE_NAME = 'T_PAYS';
    const ID = 'id';
    const PAY_ID = 'pay_id';
    const ORDERS_ID = 'orders_id';
    const PAY_DATE = 'pay_date';
    const PAY_WAY = 'pay_way';
    const PAY_STATUS = 'pay_status';

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
