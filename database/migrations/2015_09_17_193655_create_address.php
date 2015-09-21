<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('spati_id')->index();

            $table->string('street_address')->nullable(true);
            $table->string('route')->nullable(true);
            $table->string('intersection')->nullable(true);
            $table->string('political')->nullable(true);
            $table->string('country')->nullable(true);
            $table->string('administrative_area_level_1')->nullable(true);
            $table->string('administrative_area_level_2')->nullable(true);
            $table->string('administrative_area_level_3')->nullable(true);
            $table->string('administrative_area_level_4')->nullable(true);
            $table->string('administrative_area_level_5')->nullable(true);
            $table->string('colloquial_area')->nullable(true);
            $table->string('locality')->nullable(true);
            $table->string('ward')->nullable(true);
            $table->string('sublocality')->nullable(true);
            $table->string('neighborhood')->nullable(true);
            $table->string('premise')->nullable(true);
            $table->string('subpremise')->nullable(true);
            $table->string('postal_code')->nullable(true);
            $table->string('natural_feature')->nullable(true);
            $table->string('airport')->nullable(true);
            $table->string('park')->nullable(true);
            $table->string('point_of_interest')->nullable(true);

            $table->string('floor')->nullable(true);
            $table->string('establishment')->nullable(true);
            $table->string('parking')->nullable(true);
            $table->string('post_box')->nullable(true);
            $table->string('postal_town')->nullable(true);
            $table->string('room')->nullable(true);
            $table->string('street_number')->nullable(true);
            $table->string('bus_station')->nullable(true);
            $table->string('train_station')->nullable(true);
            $table->string('transit_station')->nullable(true);

            $table->double('longitude', 10, 6)->index();
            $table->double('latitude', 10, 6)->index();

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
        Schema::drop('addresses');
    }
}
