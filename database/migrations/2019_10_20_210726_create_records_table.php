<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->string('id', 32);
            $table->primary('id');

            $table->string('user_id',16);
            $table->bigInteger('music_id');
            $table->string('store');

            $table->dateTime('time');

            $table->integer('level');

            $table->integer('jc_cnt');
            $table->integer('cr_cnt');
            $table->integer('at_cnt');
            $table->integer('ms_cnt');

            $table->integer('max_cmb');

            $table->integer('track_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
