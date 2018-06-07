<?php

use Illuminate\Database\Seeder;

class EstadoEquipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EstadoEquipo')->insert([
        'descripcion'=>'Nuevo',
        ]);
        
        DB::table('EstadoEquipo')->insert([
        'descripcion'=>'En Reparación',
        ]);

        DB::table('EstadoEquipo')->insert([
        'descripcion'=>'Alquilado',
        ]);

        DB::table('EstadoEquipo')->insert([
        'descripcion'=>'Disponible',
        ]);

        DB::table('EstadoEquipo')->insert([
        'descripcion'=>'No Disponible',
        ]);
    }
}
