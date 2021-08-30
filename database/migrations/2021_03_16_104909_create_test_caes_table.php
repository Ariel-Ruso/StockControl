<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_caes', function (Blueprint $table) {
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
        Schema::dropIfExists('test_caes');
    }
}
