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
            $table->string('names');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('whatsapp');
            $table->text('message');
            $table->text('products');
            $table->decimal('subtotal');
            $table->decimal('total');
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
