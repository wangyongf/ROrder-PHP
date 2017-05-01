<?php

namespace App\Models\App\App;

use App\Models\BaseModel;

/**
 * APP信息表
 *
 * Class App
 * @package App\Models\App\App
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class App extends BaseModel
{
    const TABLE_NAME = 'T_APPS';
    const ID = 'id';
    const APPID = 'appid';
    const NAME = 'name';
    const HOME_PAGE = 'home_page';

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
