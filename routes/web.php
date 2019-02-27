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

Route::get('/', function () {
    return view('admin.login');
});

Route::get('hello', function () {
    return 'Hello Words!!!';
});

Route::prefix('admin')->group(function () {
	Route::get('login', 'Admin\LoginController@index');
	Route::post('user_login', 'Admin\LoginController@login');
	Route::any('logout', 'Admin\LoginController@logout');
});


// 医美小程序后台
Route::prefix('admin')->middleware('login')
    ->group(function () {
        Route::get('userlist', 'Admin\UserController@userlist');
        Route::get('index', 'Admin\UserController@index');
        Route::get('userinfo', 'Admin\UserController@userinfo');
        Route::post('user_del', 'Admin\UserController@user_del');
        Route::post('user_edit', 'Admin\UserController@user_edit');
        Route::get('signin', 'Admin\SigninController@signin');
        Route::post('signin_add', 'Admin\SigninController@signin_add');
        Route::post('signin_del', 'Admin\SigninController@signin_del');
        Route::post('signin_edit', 'Admin\SigninController@signin_edit');
});

