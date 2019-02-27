<?php

namespace App\Http\Controllers\Wxapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ResponseHelper;
use App\Http\Services\User as UserServices;
use App\User;

class UserController extends Controller
{
	/**
	* 获取用户信息
	* @param Request $request
	* @return 
	**/
    public function get_userinfo(Request $request){
        $user_id = UserServices::store($request);

        if($user_id){
            $user = User::find($user_id);
        	return ResponseHelper::success($user);    
    	}

    	return ResponseHelper::error('保存用户信息失败');
    }
}
