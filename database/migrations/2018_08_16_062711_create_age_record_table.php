<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgeRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('age');
            $table->integer('user_id');

            $table->integer('create_time')->default(0);
            $table->integer('update_time')->default(0);

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_record');
    }
}
