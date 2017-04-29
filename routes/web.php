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

/**
 * api,提供给其他端(App, Web等)
 */

Route::group(['prefix' => 'api/app/auth'], function () {
    //APP端顾客注册
    Route::match(['get', 'post'], 'register', 'App\Auth\RegisterController@register');

    //APP端顾客登录
    Route::match(['get', 'post'], 'login', 'App\Auth\LoginController@login');
});

//餐厅
Route::resource('restaurants', 'App\RestaurantController');