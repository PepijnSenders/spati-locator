<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_times', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('spati_id')->index();

            $table->integer('day_of_week')->index();
            $table->time('open_time');
            $table->time('close_time');
            $table->boolean('closed');

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
        Schema::drop('opening_times');
    }
}
