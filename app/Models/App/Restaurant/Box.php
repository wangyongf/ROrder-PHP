<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 餐厅房间表
 *
 * Class Box
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Box extends BaseModel
{
    const TABLE_NAME = 'T_BOXES';
    const ID = 'id';
    const BOX_ID = 'box_id';
    const NAME = 'name';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const CAPACITY = 'capacity';
    const TOTAL_TABLE_COUNT = 'total_table_count';
    const AVAILABLE_TABLE_COUNT = 'available_table_count';
    const BOX_TYPE = 'box_type';
    const STATUS = 'status';
    const PICTURES = 'pictures';
    const DESCRIPTION = 'description';

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
