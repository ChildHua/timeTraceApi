<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_block', function (Blueprint $table) {
            $table->increments('id');
            $table->date('belong')->comment('归属日期');
            $table->tinyInteger('hour')->comment('小时');
            $table->tinyInteger('moment')->comment('时刻');
            $table->unsignedInteger('tag')->comment('tag id');
            $table->unsignedInteger('link')->default(0)->comment('link id');
            $table->unsignedBigInteger('user')->comment('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_block');
    }
}
