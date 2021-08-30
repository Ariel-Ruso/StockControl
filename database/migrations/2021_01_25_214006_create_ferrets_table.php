<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferrets', function (Blueprint $table) {
            $table->string('codigo');
                    //->unique();
            $table->string('articulo');
            $table->string('rubro');
            $table->integer('bulto');
            $table->integer('plista');
            $table->integer('ppublico');
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
        Schema::dropIfExists('ferrets');
    }
}
