<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 商品(菜品)分类表
 *
 * Class GoodsCategory
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class GoodsCategory extends BaseModel
{
    const TABLE_NAME = 'T_GOODS_CATEGORIES';
    const ID = 'id';
    const CATEGORY_ID = 'category_id';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const NAME = 'name';
    const PARENT_ID = 'parent_id';

    const WEIGHT = 'weight';

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
