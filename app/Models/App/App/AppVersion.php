<?php

namespace App\Models\App\App;

use App\Models\BaseModel;

/**
 * APP版本管理表
 *
 * Class AppVersion
 * @package App\Models\App\App
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class AppVersion extends BaseModel
{
    const TABLE_NAME = 'T_APP_VERSIONS';
    const ID = 'id';
    const APPID = 'appid';
    const VERSION_CODE = 'version_code';
    const VERSION_NAME = 'version_name';
    const FORCE_UDPATE = 'force_update';
    const UPDATE_DESCRIPTION = 'update_description';
    const DOWNLOAD_URL = 'download_url';

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
