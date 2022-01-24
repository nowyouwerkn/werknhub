<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wk_site_configs', function (Blueprint $table) {
            $table->id();

            // Store Config
            $table->boolean('install_completed')->default(false);

            $table->string('site_logo')->nullable();
            $table->string('site_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('site_industry')->nullable();

            $table->text('google_analytics')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->string('facebook_access_token')->nullable();

            // Contact Information
            $table->string('rfc_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('street_num')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('country_id')->nullable();
            
            // Standard Measures
            $table->string('timezone')->nullable();
            $table->enum('unit_system', ['Sistema Métrico', 'Sistema Imperial']);
            $table->enum('weight_system', ['Kilogramos (Kg)', 'Gramos (g)', 'Libra (Lb)', 'Onza (oz)']);
            $table->integer('currency_id')->nullable();

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
        Schema::dropIfExists('wk_site_configs');
    }
}
