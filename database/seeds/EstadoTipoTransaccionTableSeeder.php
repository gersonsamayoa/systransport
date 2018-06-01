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

        DB::table('tipoTransaccion')->insert([
        'descripcion'=>'Alquiler',
        ]);

        DB::table('tipoTransaccion')->insert([
        'descripcion'=>'Compra',
        ]);
    }
}
