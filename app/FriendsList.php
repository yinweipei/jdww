<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendsList extends Model
{
    /**
     * table name
     * @var string
     */
    protected $table = 'friends_list';
    /**
     * 自增长主键
     * @var string
     */
    protected $primaryKey = 'id';

    protected $hidden = ['create_time','update_time'];

    public function friends_age(){
    	return $this->belongsTo('App\AgeRecord','friends_id','user_id');
    }

    /**
     * 自增长主键
     * @param int
     * @return array 
     */
    public function friends_age_list($userid){
        $friends_rank = self::where('user_id',$userid)->
            with(['friends_age'=>function($query){
                $t = time();
                $start = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
                $end = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
                $query->whereBetween('age_record.create_time',[$start,$end]);
            }])->get()->toArray();

        foreach ($friends_rank as $k => $v) {
            $friends_rank[$k]['name'] = User::where('id', $v['friends_id'])->pluck('nickname')[0];        
        }    

        return $friends_rank;
    }
}
