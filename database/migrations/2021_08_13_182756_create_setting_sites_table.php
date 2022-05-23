<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('down_name');
            $table->text('email');
            $table->text('phone');
            $table->text('address');
            $table->string('map', 500)->nullable();
            $table->string('attention');
            $table->integer('postal_code');
            $table->string('logo_dark')->nullable();
            $table->string('logo_white')->nullable();
            $table->string('favicon')->nullable();
            $table->text('media_social')->nullable();
            $table->text('banner_top')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->text('abstract')->nullable();
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
        Schema::dropIfExists('setting_sites');
    }
}
