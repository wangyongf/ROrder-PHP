<?php

namespace App\Models\App\Order;

use App\Models\BaseModel;

/**
 * 上菜进度表
 *
 * Class DishSchedule
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class DishSchedule extends BaseModel
{
    const TABLE_NAME = 'T_DISH_SCHEDULE';
    const ID = 'id';
    const ORDERS_ID = 'orders_id';
    const ORDER_DETAILS_ID = 'order_details_id';
    const STATUS = 'status';
    const SCHEDULE = 'schedule';        //进度(枚举)：n            0尚未开始制作，1正在制作，2制作完成上菜中，3上菜完毕，4其它
    const COOKS_ID = 'cooks_id';

    /**
     * 自增主键
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
