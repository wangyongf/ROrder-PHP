<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 餐厅厨师表
 *
 * Class Cook
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Cook extends BaseModel
{
    const TABLE_NAME = 'T_COOKS';
    const ID = 'id';
    const COOKS_ID = 'cooks_id';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const TITLE = 'title';
    const STATUS = 'status';
    const NAME = 'name';
    const SEX = 'sex';
    const BIRTHDAY = 'birthday';
    const PICTURES = 'pictures';

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
