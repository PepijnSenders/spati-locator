<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('spati_id')->index();

            $table->boolean('has_tv')->default(false);
            $table->boolean('has_gambling')->default(false);
            $table->boolean('has_cigarettes')->default(false);
            $table->boolean('has_beer')->default(false);
            $table->boolean('has_liquor')->default(false);
            $table->boolean('has_printing')->default(false);
            $table->boolean('has_snacks')->default(false);
            $table->boolean('has_warm_food')->default(false);
            $table->boolean('has_household')->default(false);

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
        Schema::drop('amenities');
    }
}
