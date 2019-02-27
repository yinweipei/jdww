<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;
use App\Http\Services\User as UserServer;
use App\Http\Services\ResponseHelper;

class LoginController extends Controller
{
    /**
    * 登录页
    */
    public function index(){
    	return view('admin.login');
    }

    /**
    * 后台登录
    * @param string user
    * @param string password
    * @return json
    */
    public function login(Request $request){
    	$username = $request->input('user');
    	$password = UserServer::md5_csrf($request->input('password'));

    	$userinfo = AdminUser::where('name',$username)->first();
    	//如果存在账号
    	if($userinfo){
    		$userinfo = $userinfo->toArray();
    		if($userinfo['password'] == $password){
    			$request->session()->put('user', $userinfo);
    			//登录成功
    			return ResponseHelper::success('登录成功');
    		}else{
    			return ResponseHelper::error('账号或密码错误');
    		}
    	}

    	return ResponseHelper::error('账号或密码错误');
    }

    /**
    * 退出
    */
    public function logout(Request $request){
    	$request->session()->forget('user');

    	return redirect("admin/login");
    }
}
