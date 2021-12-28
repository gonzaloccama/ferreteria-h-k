<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask_information', function (Blueprint $table) {
            $table->id();
            $table->string('info_names');
            $table->string('info_email');
            $table->string('info_celular')->nullable();
            $table->string('info_whatsapp');
            $table->text('info_message');
            $table->text('info_products');
            $table->decimal('info_subtotal');
            $table->decimal('info_total');
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
        Schema::dropIfExists('ask_information');
    }
}
