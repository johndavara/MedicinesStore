<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->boolean('description',256)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        // Insert some stuff
    DB::table('category')->insert(
        array(
            'name' => 'Antiinfecciosos'
        )
    );
    DB::table('category')->insert(
        array(
            'name' => 'Antídotos‎'
        )
    );

    DB::table('category')->insert(
        array(
            'name' => 'Antianémicos‎'
        )
    );

    DB::table('category')->insert(
        array(
            'name' => 'Anticoagulantes‎'
        )
    );

    
    DB::table('category')->insert(
        array(
            'name' => 'Antihemorrágicos'
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
