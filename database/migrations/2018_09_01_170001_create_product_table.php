<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('description',1000)->nullable();
            $table->string('photo',1000)->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('idCategory')->references('id')->on('category');
        });

                // Insert some stuff
    DB::table('product')->insert(
        array(
            'idCategory' => '1',
            'name' => 'Clotrimazol',
            'description' => 'El clotrimazol (nombre comercial Canesten o Clotrimin) es un medicamento antimicótico comúnmente usado para el tratamiento de infecciones (de humanos como de otros animales) tales como las infecciones vaginales por levaduras, candidiasis oral, y dermatofitosis (tiña). También se utiliza para tratar el pie de atleta y tinea cruris.',
            'photo'=>'1.jpg',
            'price' => 50000
        )
    );

    DB::table('product')->insert(
        array(
            'idCategory' => '1',
            'name' => 'Miconazol',
            'description' => 'El miconazol es un derivado imidazólico que se utiliza en medicina como antifúngico. Químicamente C18H14Cl4N2O es prácticamente insoluble en agua, y soluble en disolventes orgánicos.',
            'photo'=>'2.jpg',
            'price' => 10000
        )
    );

    DB::table('product')->insert(
        array(
            'idCategory' => '2',
            'name' => 'Paracetamol',
            'description' => 'El paracetamol (DCI), también conocido como acetaminofén o acetaminofeno, es un fármaco con propiedades analgésicas y antipiréticas utilizado principalmente para tratar la fiebre y el dolor leve y moderado',
            'photo'=>'3.jpg',
            'price' => 5000
        )
    );

    DB::table('product')->insert(
        array(
            'idCategory' => '2',
            'name' => 'Flumazenil',
            'description' => 'El flumazenil es beneficioso para los pacientes con excesiva somnoliencia después de utilizar benzodiazepinas para diagnóstico o procedimientos terapéuticos.',
            'photo'=>'4.jpg',
            'price' => 5000
        )
    );

    DB::table('product')->insert(
        array(
            'idCategory' => '3',
            'name' => 'Ferogradumet',
            'description' => 'se utiliza en pacientes adultos para el tratamiento de la anemia ferropénica y de los estados... (medicamentos antianemicos).',
            'photo'=>'5.jpg',
            'price' => 5000
        )
    );

    DB::table('product')->insert(
        array(
            'idCategory' => '4',
            'name' => 'apixabán (Eliquis)',
            'description' => 'Previenen la formación de coágulos de sangre en los vasos sanguíneos y en el corazón. También impiden que los coágulos de sangre existentes se agranden.',
            'photo'=>'6.jpg',
            'price' => 6000
        )
    );

    
    DB::table('product')->insert(
        array(
            'idCategory' => '5',
            'name' => 'Feiba',
            'description' => 'Feiba se presenta como un polvo para solución para inyección por vía intravenosa, en viales de dosis única sellados con tapones de goma. Una vez reconstituido con la cantidad apropiada de disolvente... (antihemorragicos).',
            'photo'=>'7.jpg',
            'price' => 12000
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
        Schema::dropIfExists('product');
    }
}
