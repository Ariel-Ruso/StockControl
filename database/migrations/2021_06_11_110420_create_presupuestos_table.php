<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            //$table->string('descripcion');
            
            $table->integer('cantidadItems');
            
            $table->float('total');
            $table->float('totalNoBanc')
                    ->nullable();
            $table->integer('tipoPago');
            
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
        Schema::dropIfExists('presupuestos');
    }
}
