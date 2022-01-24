<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wk_notifications', function (Blueprint $table) {
            $table->id();

            $table->integer('action_by')->nullable()->unsigned();
            $table->string('model_action')->nullable();
            $table->integer('model_id')->unsigned()->nullable();
            $table->string('type');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->boolean('is_hidden')->nullable();

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
        Schema::dropIfExists('wk_notifications');
    }
}
