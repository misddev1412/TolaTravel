<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('room_type_id');
            $table->double('price');
            $table->double('promotion_price');
            $table->integer('capacity')->default(1);
            $table->integer('bed')->default(1);
            $table->bigInteger('booked')->default(0);
            $table->string('pass_wifi')->nullable();
            $table->string('thumb');
            $table->bigInteger('hotel_id');
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
        Schema::dropIfExists('rooms');
    }
}
