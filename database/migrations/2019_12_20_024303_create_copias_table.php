<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCopiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cota');
            $table->unsignedInteger('libro_id');
            $table->unsignedInteger('estado_id');
            $table->timestamps();

            $table->foreign('libro_id')
                ->references('id')
                ->on('libros')
                ->onUpdate('cascade');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
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
        Schema::dropIfExists('copias');
    }
}
