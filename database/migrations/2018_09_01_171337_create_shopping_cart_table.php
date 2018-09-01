<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingCart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idProduct')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->foreign('idProduct')->references('id')->on('product');
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppingCart');
    }
}
