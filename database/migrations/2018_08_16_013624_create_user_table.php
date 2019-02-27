<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname','50')->comment('昵称');
            $table->string('phone','50')->comment('手机');
            $table->tinyInteger('sex')->default(1)->comment('1.male 2.female');

            $table->string('email','50')->comment('邮箱');
            $table->string('image_url','250')->comment('头像');
            $table->string('remarks','250')->nullable()->comment('备注');
            $table->string('openid','50');
            $table->integer('create_time')->default(0);
            $table->integer('update_time')->default(0);

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
        Schema::dropIfExists('user');
    }
}
