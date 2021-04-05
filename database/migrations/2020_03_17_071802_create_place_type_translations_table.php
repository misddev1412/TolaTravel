<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_type_translations', function (Blueprint $table) {
            $table->integer('id');

            $table->integer('place_type_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['place_type_id', 'locale']);
            $table->foreign('place_type_id')->references('id')->on('place_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_type_translations');
    }
}
