<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id()
                ->unique();
            $table->boolean('estado')
                    ->default(0);    
            $table->double('montoIni');
            $table->double('montoFin')
                    ->nullable();
            $table->double('totEfect')
                    ->nullable();
            $table->double('totTarj')
                    ->nullable();
            $table->foreignId('users_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('cajas');
    }
}
