<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('titulo');
            $table->string('descripcion');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('autor_id');
            $table->timestamps();

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onUpdate('cascade');
            $table->foreign('autor_id')
                ->references('id')
                ->on('autores')
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
        Schema::dropIfExists('libros');
    }
}
