<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('score/user', 'Score\UserController@store');

// 医美小程序api接口
Route::prefix('wxapi')
    ->group(function () {
        Route::get('search', 'Wxapi\IndexController@face');
        Route::any('uploads', 'Wxapi\IndexController@uploads');
        Route::any('signin', 'Wxapi\IndexController@signin');
        Route::any('age_curve', 'Wxapi\IndexController@age_curve');
        Route::any('today_signin', 'Wxapi\IndexController@today_signin');
        Route::any('age_list', 'Wxapi\IndexController@age_list');
        Route::any('userinfo', 'Wxapi\UserController@get_userinfo');
});
