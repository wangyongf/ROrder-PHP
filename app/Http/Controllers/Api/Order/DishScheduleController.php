<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Models\App\Order\DishSchedule;
use App\Utils\Common\ResponseUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 上菜进度控制器
 *
 * Class DishScheduleController
 * @package App\Http\Controllers\Api\Restaurant
 *
 * @author      Scott Wang
 * @version     0.1
 * @since         ROrder-PHP 0.1
 */
class DishScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示所有的上菜进度列表的页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 显示创建新的上菜进度的页面(不建议使用)
     *
     * @deprecated
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 将新的上菜进度存储到数据库
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = DishSchedule::all()->count() + 1;
        $ordersId = $request->header(DishSchedule::ORDERS_ID);
        $orderDetailsId = $request->header(DishSchedule::ORDER_DETAILS_ID);
        $status = $request->header(DishSchedule::STATUS);
        $schedule = $request->header(DishSchedule::SCHEDULE);
        $cooksId = $request->header(DishSchedule::COOKS_ID);

        if (empty($ordersId)) {
            return ResponseUtils::nullJsonResponse('400', '客户端参数错误');
        }

        // TODO: checkHeader--middleware

        $dishSchedule = new DishSchedule();
        $dishSchedule->id = $id;
        $dishSchedule->orders_id = $ordersId;
        $dishSchedule->order_details_id = $orderDetailsId;
        $dishSchedule->status = $status;
        $dishSchedule->schedule = $schedule;
        $dishSchedule->cooks_id = $cooksId;
        $dishSchedule->save();

        return ResponseUtils::simpleSuccessJsonResponse();
    }

    /**
     * 获取指定上菜进度的信息(json)
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $dishSchedule = DishSchedule::find($id);
        return response()->json($dishSchedule->toArray());
    }

    /**
     * Display the specified resource.
     * 显示指定上菜进度的页面
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
     * 显示编辑指定上菜进度的页面
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
     * 在数据库中更新指定上菜进度
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $finalResult = array();
        $finalResult['code'] = 0;
        $finalResult['msg'] = '接口调用成功';

        $detailsId = $request->input('order_details_id');
        $schedule = $request->input('schedule');

        $dishSchedule = DishSchedule::where(DishSchedule::ORDER_DETAILS_ID, $detailsId)->first();

        $result = array();
        if (!empty($dishSchedule) && $dishSchedule->STATUS == 1) {               //0-无效,1-有效,2-其它
//            $dishSchedule->SCHEDULE = $schedule;
            // TODO: 更新失败???
//            $dishSchedule->save();
            DB::table(DishSchedule::TABLE_NAME)
                ->where(DishSchedule::ORDER_DETAILS_ID, $detailsId)
                ->update([DishSchedule::SCHEDULE => $schedule]);

            $result['result'] = 0;
        } else {
            $result['result'] = 1;
        }

        $finalResult['data'] = $result;

        return response()->json($finalResult);
    }

    /**
     * Remove the specified resource from storage.
     * 在数据库中移除指定上菜进度
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
