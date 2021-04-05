<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('place_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->longText('description');

            $table->unique(['place_id', 'locale']);
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_translations');
    }
}
