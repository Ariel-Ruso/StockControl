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
            $table->String('codigo')
                    ->nullable();
            $table->String('nombre');
            $table->String('descripcion')
                    ->nullable();
            $table->String('talle')
                    ->nullable();
            $table->integer('cantidad');
            $table->float('precioCompra')
                    ->nullable();
            $table->float('iva')
                    ->nullable();   
            $table->float('precioVenta')
                    ->nullable();
            $table->float('pVentaTarj')
                    ->nullable();
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
            $table->String('marca')
                    ->nullable();       
            //$table->String('imei')
              
            $table->String('modelo')
                    ->nullable();  
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
