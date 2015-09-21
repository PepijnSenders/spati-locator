<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_informations', function(Blueprint $table) {
            $table->increments('id');

            $table->string('phone')->nullable(true);
            $table->string('fax')->nullable(true);
            $table->string('cellphone')->nullable(true);

            $table->string('email')->nullable(true);
            $table->string('website')->nullable(true);

            $table->string('facebook')->nullable(true);
            $table->string('yelp')->nullable(true);
            $table->string('google_plus')->nullable(true);
            $table->string('trip_advisor')->nullable(true);
            $table->string('foursquare')->nullable(true);

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
        Schema::drop('contact_informations');
    }
}
