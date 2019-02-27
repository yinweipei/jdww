<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * table name
     * @var string
     */
    protected $table = 'user';
    /**
     * 自增长主键
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['sex' ,'email' ,'openid' ,'nickname' ,'phone'];

    protected $hidden = [
        'create_time', 'update_time',
    ];

    public $timestamps = false;

    public function get_age(){
        return $this->hasMany('App\AgeRecord','user_id','id');
    }

    public function edit_user($request){
        $id = $request->id;

        $model = self::find($id);

        $model->nickname = $request->nickname;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->sex = $request->sex;
        $model->remarks = $request->remarks;
        $model->update_time =time();

        if($model->save()){
            return $model->id;
        }
        return false;
    }
}
