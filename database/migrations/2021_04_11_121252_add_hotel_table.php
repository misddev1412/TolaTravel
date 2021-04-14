<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('address');
            $table->text('about');
            $table->text('policy');
            $table->text('short_description');
            $table->bigInteger('city_id');
            $table->integer('is_verified')->default(0);
            $table->integer('is_enable')->default(1);
            $table->integer('is_featured')->default(0);
            $table->bigInteger('viewed')->default(0);
            $table->integer('star')->default(0);
            $table->bigInteger('liked')->default(0);
            $table->bigInteger('dislike')->default(0);
            $table->bigInteger('checkin')->default(0);
            $table->bigInteger('shared')->default(0);
            $table->bigInteger('manager_id')->default(0);
            $table->integer('is_branch')->default(0);
            $table->bigInteger('belong')->default(0);
            $table->string('thumb')->default(0);
            $table->string('language')->default('en');
            $table->string('currency')->default('vnd');
            $table->string('google_map')->default(0);
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
        Schema::dropIfExists('hotels');
    }
}
