<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaccion', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('cantidadDias')->nullable();
            $table->float('total', 8,2);

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('tipoTransaccion_id')->unsigned();
            $table->foreign('tipoTransaccion_id')->references('id')->on('tipoTransaccion')->onDelete('cascade');
            
            $table->integer('maquinaria_id')->unsigned();
            $table->foreign('maquinaria_id')->references('id')->on('maquinaria')->onDelete('cascade');
           
            $table->integer('estadoTransaccion_id')->unsigned();
            $table->foreign('estadoTransaccion_id')->references('id')->on('estadoTransaccion')->onDelete('cascade');
            
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
        Schema::drop('transaccion');
    }
}
