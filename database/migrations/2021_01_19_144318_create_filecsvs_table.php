<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilecsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filecsvs', function (Blueprint $table) {
            $table->id();
            $table->integer('ptovta');
            $table->integer('tipocomp');
            $table->integer('concepto');
            $table->string('fechacomp');
            $table->string('fechavto');
            $table->string('fechadesde');
            $table->string('fechahasta');
            $table->string('cuit');
            $table->integer('tipodoc');

            $table->decimal('gravado');
            $table->decimal('nogravado');
            $table->decimal('exento');
            $table->decimal('total');

            $table->string('moneda');
            $table->decimal('tipocambio');
            $table->integer('cantcomp');
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
        Schema::dropIfExists('filecsvs');
    }
}
