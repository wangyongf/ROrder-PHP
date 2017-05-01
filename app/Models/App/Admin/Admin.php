<?php

namespace App\Models\App\Admin;

use App\Models\BaseModel;

/**
 * 管理员表
 *
 * Class Admin
 * @package App\Models\App\Admin
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class Admin extends BaseModel
{
    const TABLE_NAME = 'T_ADMINS';
    const ID = 'id';
    const ADMIN_ID = 'admin_id';
    const EMAIL = 'email';
    const MOBILE = 'mobile';
    const NAME = 'name';
    const PASSWORD = 'password';

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
