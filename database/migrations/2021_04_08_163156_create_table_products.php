<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->bigInteger('image_id');
            $table->double('current_price');
            $table->double('import_price')->default(0);
            $table->double('promotion_price')->default(0);
            $table->integer('status')->default(1);
            $table->integer('is_featured')->default(0);
            $table->integer('is_home')->default(0);
            $table->integer('is_recommend')->default(0);
            $table->bigInteger('viewed')->default(0);
            $table->bigInteger('user_id');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_tag')->nullable();
            $table->string('seo_img')->nullable();
            $table->text('tags')->nullable();
            $table->string('video_provider')->nullable();
            $table->string('video_link')->nullable();
            $table->bigInteger('unit_id');

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
        Schema::dropIfExists('products');
    }
}
