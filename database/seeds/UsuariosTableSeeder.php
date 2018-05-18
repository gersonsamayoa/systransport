<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table ('users')->insert([
          'name'  =>'Gerente General',
          'email' =>'gerentegeneral@systransport.com.gt',
          'password'  =>bcrypt('gerentegeneral'),
          'type'      =>'gerentegeneral',
          'region'	=>'coban',
      ]);

        DB::table ('users')->insert([
          'name'  =>'Gerente de Mineria',
          'email' =>'gerentemineria@systransport.com.gt',
          'password'  =>bcrypt('gerentemineria'),
          'type'      =>'gerentemineria',
          'region'	=>'coban',
      ]);

        DB::table ('users')->insert([
          'name'  =>'Usuario de Mineria',
          'email' =>'usuariomineria@systransport.com.gt',
          'password'  =>bcrypt('usuariomineria'),
          'type'      =>'usuariomineria',
          'region'	=>'coban',
      ]);
    }
}
