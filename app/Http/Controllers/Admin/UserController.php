<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ResponseHelper;
use App\User;

class UserController extends Controller
{
    /**
    * 获取用户列表
    * @param string search
    * @return array 
    */
	public function userlist(Request $request){
		$search = $request->input('search');
		$users = User::where('status',1)->where('nickname','like','%'.$search.'%')->orderBy('create_time','desc')->paginate(5);

		return view('admin.userlist',[
			'users' => $users
		]);
	}

	/**
	* 医美小程序后台首页
	*/
	public function index(){
		return view('admin.index');
	}

	/**
	* 获取用户信息
	* @param int
	* @return view
	*/
	public function userinfo(Request $request){
		$id =  $request->input('id');

		if(empty($id)){
    		return ResponseHelper::error('非法参数');
    	}

    	$model =User::find($id);
    	if(empty($model)){
    		return ResponseHelper::error('非法参数');
    	}

		return view('admin.userinfo',[
			'user' => $model
		]);
	}

	/**
	* 用户删除
	* @param int
	* @return json
	*/
	public function user_del(Request $request){
		$id = $request->input('id');
	
    	if(empty($id)){
    		return ResponseHelper::error('非法参数');
    	}
    	$model =User::find($id);
    	$model->status = 0;

    	if($model->save()){
    		return ResponseHelper::success('删除成功');
    	}
    	return ResponseHelper::error('删除失败');
	}

	/**
	* 用户修改
	* @param int
	* @return json
	**/
	public function user_edit(Request $request){
		//验证手机号码是否合法
        $pattern = "/^1[34578]\d{9}$/";
        preg_match($pattern, $request->phone,$matches);
        if(empty($matches)){
            return ResponseHelper::error('手机号码格式错误');
        }
		//验证邮箱是否合法
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
        preg_match($pattern, $request->email,$matches);
        if(empty($matches)){
            return ResponseHelper::error('邮箱格式错误');
        }

		$result = (new User())->edit_user($request);

		if($result){
			return ResponseHelper::success('修改成功');
		}
		return ResponseHelper::error('修改失败');
	} 
}
