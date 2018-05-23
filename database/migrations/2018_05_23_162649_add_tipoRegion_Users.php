<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoRegionUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
             $table->integer('tipoUsuario_id')->unsigned();
             $table->foreign('tipoUsuario_id')->references('id')->on('tipoUsuario')->onDelete('cascade');
             $table->integer('region_id')->unsigned();
             $table->foreign('region_id')->references('id')->on('region')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropforeign(['region_id']);
            $table->dropforeign(['tipoUsuario_id']);
            $table->dropColumn('tipoUsuario_id');
            $table->dropColumn('region_id');
        });
    }
}
