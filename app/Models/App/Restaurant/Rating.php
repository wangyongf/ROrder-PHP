<?php

namespace App\Models\App\Restaurant;

use App\Models\BaseModel;

/**
 * 用户评价表
 *
 * Class Rating
 * @package App\Models\App\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Rating extends BaseModel
{
    const TABLE_NAME = 'T_RATINGS';
    const ID = 'id';
    const ORDERS_ID = 'orders_id';
    const GENERAL_RATING = 'general_rating';
    const SERVICE_RATING = 'service_rating';
    const ENV_RATING = 'env_rating';
    const FOOD_RATING = 'food_rating';
    const COMMENT = 'comment';
    const RECOMMEND = 'recommend';
    const COMMENT_PICTURES = 'comment_pictures';
    const STATUS = 'status';

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
