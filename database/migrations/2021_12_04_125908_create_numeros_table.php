<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numeros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('articulos_id')
                ->references('id')
                ->on('articulos')
                ->onDelete('cascade');
            $table->string('color')
                ->nullable();
            $table->integer('numero')
                ->nullable();
            $table->integer('cantidad')
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
        Schema::dropIfExists('numeros');
    }
}
