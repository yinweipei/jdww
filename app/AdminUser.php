<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    /**
     * table name
     * @var string
     */
    protected $table = 'admin_user';
    /**
     * 自增长主键
     * @var string
     */
    protected $primaryKey = 'id';
    
    public $timestamps = false;
}
