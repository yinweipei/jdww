<?php

namespace App\Http\Controllers\Wxapi;

use App\User;
use App\AgeRecord;
use App\FriendsList;
use App\Signin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Curl;
use App\Http\Services\ResponseHelper;
use App\Http\Services\Lunar;

class IndexController extends Controller
{
    /**
    * 调用第三方接口
    * @param string 
    * @return json
    */
    public function face($photo_url,$user_id){
    	$url = env('API_URL');
    	$past_data = array(
    		'api_key' => env('API_KEY'),
    		'api_secret' => env('API_SECRET'),
    		'image_url' => $photo_url,
    		'return_attributes' => 'age,gender,emotion,beauty,skinstatus'
    	);
    	$data = new Curl();
    	$data = $data->curl_post($url,$past_data);
            
    	$json = json_decode($data,true);
        if(empty($json['faces'])){
            return false;
        }
        
        $user = (new AgeRecord())->age_save($json['faces'][0]['attributes']['age']['value'],$user_id);
    	return $json;
    }

    /**
    * 根据图片人脸识别
    * @param Request $request
    * @return json
    */
    public function uploads(Request $request){
    	
    		$file = $request->file('photo');
            $user_id = $request->user_id;

    		// 验证是否有图片上传
    		if($file->isValid()) {
    			$path = $file->store('uploads/'.date('Ymd',time()),'uploads');
    			$filepath = env('APP_URL') . '/public/' . $path;

    			$get = $this->face($filepath,$user_id);
                if(!$get){
                    return ResponseHelper::error('没有识别到人物');
                }
    			return ResponseHelper::success($get);
    		}else{
    			return ResponseHelper::error('出错');
    		}
    	
        
    	return ResponseHelper::error('出错');
    }

    public function signin(){
        $user = (new AgeRecord())->age_save(11,3);
        var_dump($user);exit();
    	// $user  = User::where('id','1')
     //        ->with(['get_age'=>function($qusery){
     //            $qusery->where('age_record.age','>',20);
     //        }])->get()->toArray();
     //    var_dump($user);exit();
    	$lunar=new Lunar();
		$today=$lunar->convertSolarToLunar(date('Y'),date('m'),date('d'));
		var_dump($today[1].$today[2]);
		echo time();
    }


    /**
    * 获取好友榜的年龄排名
    * @param int
    * @return json
    **/
    public function age_curve(){
       
        $friends_rank = (new FriendsList)->friends_age_list(1);
        
        return ResponseHelper::success($friends_rank);
    }

    /**
    * 获取今日美签
    * @param 
    * @return json
    **/
    public function today_signin(){
        
        $sign = (new Signin())->sign();

        return ResponseHelper::success($sign);
    } 

    /**
    * 获取年龄榜
    * @param 
    * @return json
    **/
    public function age_list(Request $request){
        $user_id = $request->user_id;
        $age =(new AgeRecord())->age_test($user_id);
        
        return ResponseHelper::success($age);
    }

    public function get_userinfo(){
        $code = "033NVJoo0Y09Aq1Rxdoo04Lsoo0NVJoD";
        $encryptedData = "dhnVgdFpUNfJuM3e16pdw0HTMF2mdNncqff847N/HBjRL6VozXEJHlQOI+7XRHJTbcc/9V66GJgMV5CSMefBO23BFVcGOAYWf5EphcqWV74tTvT0qYNMfhqWjeCFqMBK7vpX+e1m9St4Z8iXEXuOzZzUIanOkMn26W6l/6bE5ifEh5eYaAw/fLBxf573QXvyaijB5x+qg1L9lO8+o4KLDn9ni/motnSOVp5Xqi93bBWXXdWT5VnwQDcQJQia4qbN0su3tyqInz1TOOfOeO0o4QaPw8jNRF0ctcUBXAaTk6sAH7m2jUAGsB5k1QSXeReoileB06uAVzELa+G081PPIEV4ZSYjqFsC018RjcYlGhejY3Vz1B71GL8eeBddeZYCFpLolp/7y5nTWujAwgY2KgWwK3niSImzqMagGJacJG8+ne9h0xWDMadSnhNhUyZTV5WXiXHpRElCTsQaZjleqmuc0QmHH0YmeLyxSVzfZ2DKyAteEhsZbu/517oG0YXC";
        $iv = "zJm17r6TX1e8OI4uS6020g==";
        $appid = 'wxb507dfa888aa1e4f' ;
        $secret = 'dbc9183403b911b6321e8336bb9be7ba';

        $URL = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";

        $apiData=file_get_contents($URL);
        $apiData = json_decode($apiData,true);
        // echo __DIR__ . '/../../../Lib/Wxencrypt/WXBizDataCrypt.php';exit();
        require __DIR__ . '/../../../Lib/Wxencrypt/WXBizDataCrypt.php';

        $session_key = $apiData['session_key'];
        $pc = new \WXBizDataCrypt($appid,$session_key);
        $errCode = $pc->decryptData($encryptedData,$iv,$data);
      
        if ($errCode !== 0) {
            return false;
        }
        print($data);    
    }

}
