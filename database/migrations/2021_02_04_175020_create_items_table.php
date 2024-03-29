<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            
            $table->integer('idFactura')
                    ->nullable();
            $table->integer('idPresupuesto')
                    ->nullable();
            $table->integer('idPedido')
                    ->nullable();
            $table->string('descripcion');
            $table->string('codigo');
            $table->float('cantidad');
            $table->float('precioUnit');
            $table->string('imei')
                    ->nullable();
//<<<<<<< HEAD
            $table->float('descuento')
                    ->nullable();
            
//=======
            $table->string('numero')
                    ->nullable();
//>>>>>>> calzados
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
        Schema::dropIfExists('items');
    }
}
