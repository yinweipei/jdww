<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signin extends Model
{
    /**
     * table name
     * @var string
     */
    protected $table = 'signin';
    /**
     * 自增长主键
     * @var string
     */
    protected $primaryKey = 'id';

    protected $hidden = ['create_time','update_time'];

    public $timestamps = false;

    public function sign(){
    	$today = date('Y-m-d',time());
    	$sign = self::where('datetime','=',$today)->first();
    	
        if(!$sign){
            return [];
        }else{
            $sign = $sign->toArray();
        }

        switch ($sign['day'])
        {
        case 1:
          $sign['day'] = '星期一';
          break;
        case 2:
          $sign['day'] = '星期二';
          break;
        case 3:
          $sign['day'] = '星期三';
          break;
        case 4:
          $sign['day'] = '星期四';
          break;
        case 5:
          $sign['day'] = '星期五';
          break;
        case 6:
          $sign['day'] = '星期六';
          break;
        default:
          $sign['day'] = '星期日';
        }

        $sign['year'] = date('Y',time());
        $sign['month'] = date('m',time());
        $sign['today'] = date('d',time());

    	return $sign;
    }

    public function signin_save($request,$lunar){
        if(!empty($request->id)){
          $signin = self::find($request->id);
          $signin->update_time = time();
          $status = self::where('datetime',$request->date)->where('id','!=',$request->id)->first();
        }else{
          $signin = new Signin();
          $signin->create_time = time();
          $status = self::where('datetime',$request->date)->first();
        }
        if($status){
          return false;
        }

        $signin->title = $request->title;
        $signin->day = date('w',time());
        $signin->datetime = $request->date;
        $signin->interpretation = $request->interpretation;

        $date = strtotime($request->date);
        $today=$lunar->convertSolarToLunar(date('Y',$date),date('m',$date),date('d',$date));

        $signin->calendar = $today[1].$today[2];

        $signin->save();

        return $signin->id;  
    }
}
