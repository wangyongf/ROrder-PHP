<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\App\Admin\Admin;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;

/**
 * 管理员控制器
 *
 * Class AdminController
 * @package App\Http\Controllers\Api\Admin
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的管理员信息的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的管理员的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的管理员信息存储到数据库中
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $adminId = $request->header(Admin::ADMIN_ID);
        $email = $request->header(Admin::EMAIL);
        $mobile = $request->header(Admin::MOBILE);
        $name = $request->header(Admin::NAME);
        $password = $request->header(Admin::PASSWORD);

        if (empty($adminId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $admin = new Admin();
        $admin->admin_id = $adminId;
        $admin->email = $email;
        $admin->mobile = $mobile;
        $admin->name = $name;
        $admin->password = $password;
        $admin->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定管理员的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $admin = Admin::find($id);
        return response()->json($admin->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定管理员信息的页面
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
     * 显示编辑指定管理员信息的页面
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
     * 在数据库中更新指定管理员的信息
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
     * 在数据库中移除指定管理员的信息
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
