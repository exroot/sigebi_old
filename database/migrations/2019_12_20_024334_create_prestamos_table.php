<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id'); 
            $table->unsignedInteger('cedula');
            $table->unsignedInteger('copia_id'); 
            $table->string('observacion', 90); 
            $table->timestamp('fecha_de_prestamo')->nullable();
            $table->timestamp('fecha_a_retornar')->nullable();
            $table->timestamp('fecha_de_entrega')->nullable();

            $table->foreign('cedula')
                ->references('cedula')
                ->on('usuarios')
                ->onUpdate('cascade');
            $table->foreign('copia_id')
                ->references('id')
                ->on('copias')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}
