<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('category');
            $table->string('place_type');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->integer('price_range');
            $table->string('amenities');
            $table->string('address');
            $table->double('lat');
            $table->double('lng');
            $table->string('email');
            $table->string('phone_number');
            $table->string('website');
            $table->string('social', 500);
            $table->string('opening_hour', 500);
            $table->string('thumb');
            $table->longText('gallery');
            $table->string('video');
            $table->integer('booking_type');
            $table->string('link_bookingcom');
            $table->integer('status');

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
        Schema::dropIfExists('places');
    }
}
