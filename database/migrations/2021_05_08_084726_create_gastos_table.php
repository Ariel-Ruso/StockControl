<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->double('monto')
                ->nullable();
            $table->string('detalle')
                ->nullable(); 

            $table->foreignId('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
           /*           
            $table->foreignId('cajas_id')
                    ->references('id')
                    ->on('cajas')
                    ->onDelete('cascade');
                    */
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
        Schema::dropIfExists('gastos');
    }
}
