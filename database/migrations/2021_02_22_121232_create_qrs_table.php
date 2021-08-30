<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrs', function (Blueprint $table) {
            $table->bigIncrements('id')
                    ->unique();
            $table->integer('ver');
            $table->string('fecha');            
            $table->double('cuit', 11);
            $table->double('ptoVta', 5);
            $table->double('tipoCmp', 3);
            $table->double('nroCmp', 8); 
            $table->decimal ('importe', 13, 2); 
            $table->string('moneda', 3);
            $table->decimal ('ctz', 13, 6); 
            $table->double('tipoDocRec', 2);
            $table->double('nroDocRec', 20);
            $table->string('tipoCodAut', 1);
            $table->double('codAut', 14);
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
        Schema::dropIfExists('qrs');
    }
}
