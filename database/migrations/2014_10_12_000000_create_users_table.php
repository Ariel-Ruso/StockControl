<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            /* $table->foreignId('rols_id')
                    ->references('id')
                    ->on('rols')
                    ->onDelete('cascade'); */
                     
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')
                    ->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')
                    ->nullable();
            $table->text('profile_photo_path')
                    ->nullable();
            $table->integer('id_prop')
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
        Schema::dropIfExists('users');
    }
}
