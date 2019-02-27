<?php 
namespace App\Http\Services;

use Illuminate\Http\Request;
use App\User as UserModel;
/**
 * 
 */
class User
{
	
	/**
     * 保存小程序传递的用户信息
     * @param Request $request
     * @return bool|mixed
     */
    public static function store(Request $request)
    {
    	if (!isset($request->code) || empty($request->code)) {
            return false;
        }

        if (!isset($request->iv) || empty($request->iv)) {
            return false;
        }

        if (!isset($request->encryptedData) || empty($request->encryptedData)) {
            return false;
        }

        $appid = env('APPID') ;
        $secret = env('APPSECRET');

        $url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$request->code}&grant_type=authorization_code";

        $apiData=file_get_contents($url);
        $apiData = json_decode($apiData,true);
        
        require __DIR__ . '/../../Lib/Wxencrypt/WXBizDataCrypt.php';

        $session_key = $apiData['session_key'];
        $pc = new \WXBizDataCrypt($appid,$session_key);
        $errCode = $pc->decryptData($request->encryptedData,$request->iv,$data);
      
        if ($errCode !== 0) {
            return false;
        }

        $data = json_decode($data);

        $model = UserModel::where('openid', '=', $data->openId)->first() ?: (new UserModel());

        if ($model->user_id) {
            $model->update_time = time();
        }else{
            $model->create_time = time();
        }

        $model->openid = $data->openId;
        $model->nickname = $data->nickName;
        $model->image_url = $data->avatarUrl;
        $model->sex = $data->gender; // 1-男，2-女，0-未知
        // $model->city = $data->city;
        // $model->country = $data->country;
        // $model->province = $data->province;
        // $model->language = $data->language;
        // $model->unionid = $data->unionId ?? '';

        if ($model->save()) {
            return $model->id;
        }

        return false;
    }

    public static function md5_csrf($password){
        $str = md5($password . env('MD5_CSRF'));
        return substr($str, 5 ,20);
    }
}
