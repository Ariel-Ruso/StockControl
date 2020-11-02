<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulos_id')
                    ->references('id')
                    ->on('articulos')
                    ->onDelete('cascade');
            $table->integer('cantidad');
            $table->float('total');
            $table->float('iva');
            $table->foreignId('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->foreignId('facturas_id')
                    ->references('id')
                    ->on('facturas')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('ventas');
    }
}
