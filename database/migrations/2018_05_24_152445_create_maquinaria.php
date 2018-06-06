<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinaria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa', 120);
            $table->float('costoPorDia', 8,2)->nullable();
            $table->float('precio', 8,2)->nullable();
            $table->string('imagen')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('estadoEquipo_id')->unsigned();
            $table->foreign('estadoEquipo_id')->references('id')->on('estadoEquipo')->onDelete('cascade');
            $table->integer('tipoMaquinaria_id')->unsigned();
            $table->foreign('tipoMaquinaria_id')->references('id')->on('tipoMaquinaria')->onDelete('cascade');

            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
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
        Schema::drop('maquinaria');
    }
}
