<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 餐厅餐桌表
 *
 * Class Table
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Table extends BaseModel
{
    const TABLE_NAME = 'T_TABLES';
    const ID = 'id';
    const TABLE_ID = 'table_id';
    const CAPACITY = 'capacity';
    const BOXES_ID = 'boxes_id';                //所属房间编号
    const STATUS = 'status';
    const ORDERS_ID = 'orders_id';

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
