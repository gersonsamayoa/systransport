<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(EstadoEquipoTableSeeder::class);
        $this->call(TipoMaquinariaTableSeeder::class);
        $this->call(EstadoTipoTransaccionTableSeeder::class);

        Model::reguard();
    }
}
