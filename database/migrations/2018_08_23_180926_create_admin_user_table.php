<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','64')->comment('账号');
            $table->char('password','20')->comment('密码');

            $table->integer('create_time')->default(0)->comment('账号创建时间');
            $table->integer('login_time')->default(0)->comment('上次登录时间');

            // $table->index('open_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
