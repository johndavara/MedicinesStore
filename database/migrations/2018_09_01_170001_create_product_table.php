<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCategory')->unsigned();
            $table->string('name',100);
            $table->boolean('description',256)->nullable();
            $table->boolean('photo',1000)->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('idCategory')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
