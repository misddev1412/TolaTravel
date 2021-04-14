<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTranslateionHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id');
            $table->string('address')->nullable();
            $table->text('about')->nullable();
            $table->text('policy')->nullable();
            $table->text('short_description')->nullable();
            $table->string('locale');
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
        Schema::dropIfExists('hotels_translations');
    }
}
