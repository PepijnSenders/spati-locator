<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternateOpeningTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternate_opening_times', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('spati_id')->index();

            $table->integer('day_of_week')->index();
            $table->date('override_start_date');
            $table->date('override_end_date');
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
        Schema::drop('alternate_opening_times');
    }
}
