<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wk_banners', function (Blueprint $table) {
            $table->id();

            $table->string('title')->required();
            $table->string('subtitle')->nullable();

            $table->string('text_button')->nullable();
            $table->boolean('has_button')->default(false);
            $table->string('link')->nullable();
            $table->string('video_background')->nullable();            

            $table->string('hex', 50)->nullable();
            $table->string('hex_text_title')->nullable();
            $table->string('hex_text_subtitle')->nullable();
            $table->string('hex_button')->nullable();
            $table->string('hex_text_button')->nullable();
            $table->string('position')->nullable();

            $table->string('image')->required();

            $table->double('priority')->default(1);
            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('wk_banners');
    }
}
