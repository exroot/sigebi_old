<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->unsignedInteger('cedula')->unique()->primary();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email', 155)->unique();
            $table->string('password');
            $table->unsignedInteger('rol_id');
            $table->unsignedInteger('carrera_id');
            $table->rememberToken();
            $table->timestamps();
             
            $table->foreign('rol_id')
                ->references('id')
                ->on('roles');
            $table->foreign('carrera_id')
                ->references('id')
                ->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
