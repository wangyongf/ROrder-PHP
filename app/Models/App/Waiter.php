<?php

namespace App\Models\App;

use App\Models\BaseModel;

class Waiter extends BaseModel
{
    const TABLE_NAME = 'T_WAITERS';
    const ID = 'id';
    const WAITER_ID = 'waiter_id';
    const RESTAURANT_INFO_ID = 'restaurant_info_id';
    const STATUS = 'status';
    const NAME = 'name';
    const ORDERS_ID = 'orders_id';
    const SEX = 'sex';
    const BIRTHDAY = 'birthday';
    const PICTURES = 'pictures';
    const TITLE = 'title';

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
