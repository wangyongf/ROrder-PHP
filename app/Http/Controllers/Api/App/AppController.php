<?php

namespace App\Http\Controllers\Api\App;

use App\Http\Controllers\Controller;
use App\Models\App\App\App;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * APP信息控制器
 *
 * Class AppController
 * @package App\Http\Controllers\Api\App
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的APP信息的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的APP的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的APP信息存储到数据库中
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $appId = $request->header(App::APPID);
        $name = $request->header(App::NAME);
        $homePage = $request->header(App::HOME_PAGE);

        if (empty($appId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $app = new App();
        $app->appid = $appId;
        $app->name = $name;
        $app->home_page = $homePage;
        $app->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定APP的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $app = App::find($id);
        return response()->json($app->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定APP信息的页面
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
     * 显示编辑指定APP信息的页面
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
     * 在数据库中更新指定APP的信息
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
     * 在数据库中移除指定APP的信息
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
