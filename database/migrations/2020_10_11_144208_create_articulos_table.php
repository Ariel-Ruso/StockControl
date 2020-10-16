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
            $table->String('nombre');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->foreignId('categorias_id')
                    ->references('id')
                    ->on('categorias')
                    ->onDelete('cascade');
            $table->foreignId('proveedors_id')
                    ->references('id')
                    ->on('proveedors')
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
        Schema::dropIfExists('articulos');
    }
}
