<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtaCtesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cta_ctes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clientes_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade');
            $table->foreignId('facturas_id')
                    ->references('id')        
                    ->on('facturas')
                    ->onDelete('cascade')
                    ->nullable();  
            $table->float('monto');
            $table->float('montoAnt')
                    ->default(0);
            $table->float('total')
                    ->default(0);
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
        Schema::dropIfExists('cta_ctes');
    }
}
