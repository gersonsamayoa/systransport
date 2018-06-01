<?php

use Illuminate\Database\Seeder;

class TipoMaquinariaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tipoMaquinaria')->insert([
        'descripcion'=>'Camion',
        ]);

         DB::table('tipoMaquinaria')->insert([
        'descripcion'=>'Aplanadora',
        ]);
    }
}
