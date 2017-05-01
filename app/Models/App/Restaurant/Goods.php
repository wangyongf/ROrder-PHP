<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 商品(菜品)表
 *
 * Class Goods
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Goods extends BaseModel
{
    const TABLE_NAME = 'T_GOODS';
    const ID = 'id';
    const GOODS_ID = 'goods_id';
    const NAME = 'name';
    const ORIGINAL_PRICE = 'original_price';
    const REAL_PRICE = 'real_price';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const DESCRIPTION = 'description';
    const AVAILABLE = 'available';                  //商品是否可用：0不可用，1可用
    const PICTURES = 'pictures';
    const GOODS_CATEGORIES_ID = 'goods_categories_id';              //所属商品分类

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
