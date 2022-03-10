<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name', 56);
            $table->string('menu_icon', 56)->nullable();
            $table->mediumText('route')->nullable();
            $table->enum('is_route', [0, 1])->nullable();
            $table->string('page')->nullable();
            $table->integer('order')->nullable();
            $table->integer('parent')->nullable();
            $table->string('type', 16)->nullable();
            $table->string('section', 52)->nullable();
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
        Schema::dropIfExists('setting_menus');
    }
}
