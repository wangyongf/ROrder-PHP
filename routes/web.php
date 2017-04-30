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

// TODO: 将所有的checkHeader方法换成相应的中间件!
// TODO: API RESTFUL化

/**
 * api,提供给其他端(App, Web等)
 */

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    //api v1
    Route::group(['prefix' => 'v1'], function() {
        //登录注册
        Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
            //APP端顾客注册
            Route::match(['get', 'post'], 'register', 'RegisterController@register');
            //APP端顾客登录
            Route::match(['get', 'post'], 'login', 'LoginController@login');
        });

        //用户
        Route::post('user/store', 'UserController@store');
        Route::get('user/get/{id}', 'UserController@get');

        Route::group(['namespace' => 'Restaurant'], function () {
            //餐厅
            Route::post('restaurant/store', 'RestaurantController@store');
            Route::get('restaurant/get/{id}', 'RestaurantController@get');

            //服务员
            Route::post('waiter/store', 'WaiterController@store');
            Route::get('waiter/get/{id}', 'WaiterController@get');

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
        });
    });
});
