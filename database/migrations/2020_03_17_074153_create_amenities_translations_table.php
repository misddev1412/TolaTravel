<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenitiesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('amenities_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['amenities_id', 'locale']);
            $table->foreign('amenities_id')->references('id')->on('amenities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenities_translations');
    }
}
