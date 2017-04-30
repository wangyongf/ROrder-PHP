<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 餐厅信息表
 *
 * Class Restaurant
 * @package App\Models\App
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Restaurant extends BaseModel
{
    const TABLE_NAME = 'T_RESTAURANT_INFO';             //表名
    const ID = 'id';                //主键
    const RESTAURANT_ID = 'restaurant_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const ADDRESS = 'address';
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
