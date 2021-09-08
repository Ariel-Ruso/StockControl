<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientes_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade');
            $table->string('responsables')
                    ->nullable();
            //$table->integer('cliente_id');
            //$table->integer('items_id');
            $table->integer('cantidadItems');
            
            $table->float('total');
            $table->float('totalNoBanc')
                    ->nullable();
            $table->integer('tipoPago');
            $table->integer('estado');

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
        Schema::dropIfExists('pedidos');
    }
}
