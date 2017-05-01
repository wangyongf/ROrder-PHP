<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Models\App\App\AppVersion;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * APP版本管理控制器
 *
 * Class AppVersionController
 * @package App\Http\Controllers\Api\App
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class AppVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的APP版本信息的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的APP版本信息的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的APP版本信息存储到数据库中
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $appId = $request->header(AppVersion::APPID);
        $versionCode = $request->header(AppVersion::VERSION_CODE);
        $versionName = $request->header(AppVersion::VERSION_NAME);
        $forceUpdate = $request->header(AppVersion::FORCE_UDPATE);
        $updateDescription = $request->header(AppVersion::UPDATE_DESCRIPTION);
        $downloadUrl = $request->header(AppVersion::DOWNLOAD_URL);

        if (empty($appId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $version = new AppVersion();
        $version->appid = $appId;
        $version->version_code = $versionCode;
        $version->version_name = $versionName;
        $version->force_update = $forceUpdate;
        $version->update_description = $updateDescription;
        $version->download_url = $downloadUrl;
        $version->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定APP版本信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $appVersion = AppVersion::find($id);
        return response()->json($appVersion->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定APP版本信息的页面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 显示编辑指定APP版本信息的页面
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 在数据库中更新指定APP版本的信息
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 在数据库中移除指定APP版本信息
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
