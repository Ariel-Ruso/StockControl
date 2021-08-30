<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilecsvCaesTable extends Migration
{
    /* 
RESULTADO DE LA TRANSACCION: “any2cae”
nroreg:	numérico, entero
obscodigo:	alfabético
obsdescrip:	alfabético
numerofact:	alfabético
vtocae:	alfabético
cae:		alfabético
codbar:	alfabético  */
    public function up()
    {
        Schema::create('filecsv_caes', function (Blueprint $table) {
            $table->id();
            $table->string('cuit');
            $table->string('cae');
            $table->string('nrofact');
            $table->date('vtocae');
            $table->string('result');
            $table->string('obscodigo')
                    ->nullable();
            $table->string('obsdescrip')
                    ->nullable();
            $table->string('codbar');
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
        Schema::dropIfExists('filecsv_caes');
    }
}
