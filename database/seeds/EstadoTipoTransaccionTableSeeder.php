<?php

use Illuminate\Database\Seeder;

class EstadoTipoTransaccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estadoTransaccion')->insert([
        'descripcion'=>'Iniciada',
        ]);
        DB::table('estadoTransaccion')->insert([
        'descripcion'=>'Finalizada',
        ]);

        DB::table('estadoTransaccion')->insert([
        'descripcion'=>'En Proceso',
        ]);

        DB::table('tipotransaccion')->insert([
        'descripcion'=>'Compra',
        ]);

        DB::table('tipotransaccion')->insert([
        'descripcion'=>'Alquiler',
        ]);

    }
}
