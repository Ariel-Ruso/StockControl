<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')
            ->nullable();
            $table->string('direccion')
            ->nullable();
            $table->string('dni')
                    ->unique();
            $table->string('cuit')
                    ->nullable();
            $table->string('telefono')
                    ->nullable();
            $table->string('email')
                    ->nullable();
            $table->double('ctaCte')
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
        Schema::dropIfExists('clientes');
    }
}
