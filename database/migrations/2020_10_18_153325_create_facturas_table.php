<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            //$table->String('codigo');
            $table->foreignId('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            //$table->string('descripcion');
            $table->string('apellidoyNombre');
            $table->string('domicilioCliente');
            $table->string('dnicliente');
            $table->string('cuitcliente')
                    ->nullable();
            $table->integer('cantidadItems');
            //$table->float('precioUnit');
            $table->float('subtotal');
            $table->float('iva');
            $table->float('total');
            $table->float('totalNoBanc')
                    ->nullable();
            $table->float('totalEft')
                    ->nullable();
            $table->float('totalCuot')
                    ->nullable();
            $table->integer('tipoPago');
            $table->string('tipoCte')
                    ->nullable();
            $table->string('numfact')
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
        Schema::dropIfExists('facturas');
    }
}
