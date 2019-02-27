<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeRecord extends Model
{
    /**
     * table name
     * @var string
     */
    protected $table = 'age_record';
    /**
     * 自增长主键
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'user_id', 'create_time', 'update_time',
    ];

    public $timestamps = false;

    /**
     * 获取年龄列表
     * @var int
     * @return array
     */
    public function age_test($user_id){
        $t = time();
        $yestoday_begin = mktime(0,0,0,date("m",$t),date("d",$t)-1,date("Y",$t));
        $yestoday_end = mktime(23,59,59,date("m",$t),date("d",$t)-1,date("Y",$t));
        $today_begin = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
        $today_end = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
        
        $age = self::where('user_id',$user_id)->orderBy('create_time','desc')->get()->toArray();
        foreach ($age as $key => $value) {
            $age[$key]['create_time'] = date('Y-m-d',$value['create_time']);
        }

        $yestoday_age = self::where('user_id',$user_id)->whereBetween('create_time',[$yestoday_begin,$yestoday_end])
                        ->select('age')->first();
        $today_age = self::where('user_id',$user_id)->whereBetween('create_time',[$today_begin,$today_end])
                        ->select('age')->first();
        $data['data'] = $age;
        $data['yestoday_age'] = $yestoday_age['age'];
        $data['today_age'] = $today_age['age'];
        return $data;
    }

    public function age_save($age,$user_id){
        $t = time();
        $today_begin = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
        $today_end = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
        $model = self::whereBetween('create_time',[$today_begin,$today_end])->where('user_id','=',$user_id)->first() ?: (new self());
        
        if($model->id){
            $model->update_time = time();
        }else{
            $model->user_id = $user_id;
            $model->create_time = time();
            
        }
        $model->age = $age;

        return $model->save();
    }

}
