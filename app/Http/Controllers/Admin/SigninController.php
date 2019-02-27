<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Signin;
use App\Http\Services\ResponseHelper;
use App\Http\Services\Lunar;

class SigninController extends Controller
{
    /**
    * 美签列表
    */
    public function signin(){
    	$signins = Signin::where('status',1)->orderBy('datetime','desc')->paginate(5);
    	
    	return view('admin.signin',[
			'signins' => $signins
		]);
    }

    /**
    * 添加美签
    * @param Objest request
    * @return json
    */
    public function signin_add(Request $request){
        //获取农历转换类
        $lunar=new Lunar();

        $result = (new Signin())->signin_save($request,$lunar);

		if($result){
			return ResponseHelper::success('添加成功');
		}
		return ResponseHelper::error('该日美签已存在');
    	
    }

    /**
    * 美签(伪)删除
    * @param int id
    * @return json
    */
    public function signin_del(Request $request){
    	$id = $request->input('id');

    	if(empty($id)){
    		return ResponseHelper::error('非法参数');
    	}
    	$model =Signin::find($id);
    	$model->status = 0;

    	if($model->save()){
    		return ResponseHelper::success('删除成功');
    	}
    	return ResponseHelper::error('删除失败');
    }

    /**
    * 美签修改
    * @param Object request
    * @return json
    */
    public function signin_edit(Request $request){
    	$id = $request->input('id');

    	if(empty($id)){
    		return ResponseHelper::error('非法参数');
    	}
    	//获取农历转换类
        $lunar=new Lunar();

        $result = (new Signin())->signin_save($request,$lunar);

    	if($result){
    		return ResponseHelper::success('修改成功');
    	}
    	return ResponseHelper::error('该日美签已存在');
    }
}
