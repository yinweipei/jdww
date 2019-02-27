<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSigninTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','250')->comment('每日标题');
            $table->tinyInteger('day')->comment('星期');
            $table->date('datetime')->comment('日期');
            $table->string('calendar','128')->comment('农历');
            $table->string('interpretation','250')->comment('解语');

            $table->integer('create_time')->default(0);
            $table->integer('update_time')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signin');
    }
}
