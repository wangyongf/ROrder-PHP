<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

/**
 * Auth,目前只给管理员提供了WEB端
 */

//Route::get('login', 'Auth\LoginController@login');
Route::get('login', function () {
    return view('admin.auth.login');
});
Route::get('register', function () {
    return view('admin.auth.register');
});
Route::get('forgotPassword', function () {
    return view('admin.auth.forgot_password');
});

// TODO: 后续token的存储上RSA等对称加密算法,客户端也一样~
// TODO: 对称加密的加密秘钥(算法&加盐etc)由握手的时候确定~
// TODO: 冷启动Token(第一次请求的Token, 是客户端写死?)
// TODO: 完成菜谱部分的接口~
// TODO: 将所有的checkHeader方法换成相应的中间件!
// TODO: API RESTFUL化

/**
 * api,提供给其他端(App, Web等)
 */

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    //api v1
    Route::group(['prefix' => 'v1'], function () {
        //登录注册
        Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
            //APP端顾客注册
            Route::match(['get', 'post'], 'register', 'RegisterController@register');
            //APP端顾客登录
            Route::match(['get', 'post'], 'login', 'LoginController@login');
        });

        //APP相关
        Route::group(['namespace' => 'App'], function () {
            //APP信息
            Route::post('app/store', 'AppController@store');
            Route::get('app/get/{id}', 'AppController@get');

            //APP版本管理
            Route::post('app_version/store', 'AppVersionController@store');
            Route::get('app_version/get/{id}', 'AppVersionController@get');
        });

        //管理员相关
        Route::group(['namespace' => 'Admin'], function () {
            //管理员
             Route::post('admin/store', 'AdminController@store');
             Route::get('admin/get/{id}', 'AdminController@get');
        });

        //用户相关
        Route::group(['namespace' => 'User'], function () {
            //用户信息
            Route::post('user/store', 'UserController@store');
            Route::get('user/get/{id}', 'UserController@get');
            Route::post('user/register_free/{mobile}', 'UserController@registerFreeLogin');                   //使用手机号免注册登录

            //用户优惠券
            Route::post('user_coupon/store', 'UserCouponController@store');
            Route::get('user_coupon/get/{id}', 'UserCouponController@get');
        });

        //订单相关
        Route::group(['namespace' => 'Order'], function () {
            //订单
            Route::post('order/store', 'OrderController@store');
            Route::get('order/get/{id}', 'OrderController@get');
            Route::post('order/order', 'OrderController@order');                //存储一笔订单
            Route::post('order/update', 'OrderController@update');          //更新一笔订单

            //订单详情
            Route::post('order_detail/store', 'OrderDetailController@store');
            Route::get('order_detail/get/{id}', 'OrderDetailController@get');

            //订单操作记录
            Route::post('order_activity_record/store', 'OrderActivityRecordController@store');
            Route::get('order_activity_record/get/{id}', 'OrderActivityRecordController@get');

            //支付流水
            Route::post('pay/store', 'PayController@store');
            Route::get('pay/get/{id}', 'PayController@get');

            //交易记录
            Route::post('transaction/store', 'TransactionController@store');
            Route::get('transaction/get/{id}', 'TransactionController@get');
        });

        //餐厅相关
        Route::group(['namespace' => 'Restaurant'], function () {
            //餐厅
            Route::post('restaurant/store', 'RestaurantController@store');
            Route::get('restaurant/get/{id}', 'RestaurantController@get');
            Route::get('restaurant/{id}/cookbook', 'RestaurantController@cookbook');

            //服务员
            Route::post('waiter/store', 'WaiterController@store');
            Route::get('waiter/get/{id}', 'WaiterController@get');
            Route::get('waiter/{id}/order', 'WaiterController@order');

            //厨师
            Route::post('cook/store', 'CookController@store');
            Route::get('cook/get/{id}', 'CookController@get');

            //餐桌
            Route::post('table/store', 'TableController@store');
            Route::get('table/get/{id}', 'TableController@get');

            //餐厅房间
            Route::post('box/store', 'BoxController@store');
            Route::get('box/get/{id}', 'BoxController@get');

            //优惠券
            Route::post('coupon/store', 'CouponController@store');
            Route::get('coupon/get/{id}', 'CouponController@get');

            //商品分类
            Route::post('goodscategory/store', 'GoodsCategoryController@store');
            Route::get('goodscategory/get/{id}', 'GoodsCategoryController@get');

            //商品(菜品)
            Route::post('goods/store', 'GoodsController@store');
            Route::get('goods/get/{id}', 'GoodsController@get');

            //用户评价
            Route::post('rating/store', 'RatingController@store');
            Route::get('rating/get/{id}', 'RatingController@get');

            //上菜进度
            Route::post('dishschedule/store', 'DishScheduleController@store');
            Route::get('dishschedule/get/{id}', 'DishScheduleController@get');
        });
    });
});
