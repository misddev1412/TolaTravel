<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('country_id');
            $table->string('name');
            $table->string('slug');
            $table->string('intro');
            $table->longText('description');
            $table->string('thumb');
            $table->string('banner');
            $table->string('best_time_to_visit');
            $table->string('currency');
            $table->string('language');
            $table->double('lat');
            $table->double('lng');
            $table->integer('priority');
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
        Schema::dropIfExists('cities');
    }
}
