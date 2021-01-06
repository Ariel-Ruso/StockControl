<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->String('descripcion')
                    ->nullable();
            $table->integer('cantidad');
            $table->float('precioCompra');
            $table->float('iva');   
            $table->float('precioVenta');
            $table->String('codbar')
                    ->nullable();
            $table->foreignId('categorias_id')
                    ->references('id')
                    ->on('categorias')
                    ->onDelete('cascade');
            $table->foreignId('proveedors_id')
                    ->references('id')
                    ->on('proveedors')
                    ->onDelete('cascade');   
            $table->String('marca');       
            $table->String('modelo');  
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
        Schema::dropIfExists('articulos');
    }
}
