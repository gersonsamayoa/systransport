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
        DB::table('tipoUsuario')->insert([
        'descripcion'=>'gerentegeneral',
        ]);
         DB::table('tipoUsuario')->insert([
        'descripcion'=>'gerentemineria',
        ]);
          DB::table('tipoUsuario')->insert([
        'descripcion'=>'gerenteproductos',
        ]);
          DB::table('tipoUsuario')->insert([
        'descripcion'=>'gerentemaquinaria',
        ]);
          DB::table('tipoUsuario')->insert([
        'descripcion'=>'usuariomineria',
        ]);
           DB::table('tipoUsuario')->insert([
        'descripcion'=>'usuarioproductos',
        ]);
            DB::table('tipoUsuario')->insert([
        'descripcion'=>'usuariomaquinaria',
        ]); 

        DB::table('tipoUsuario')->insert([
        'descripcion'=>'empleadomineria',
        ]);  
        DB::table('tipoUsuario')->insert([
        'descripcion'=>'empleadoproductos',
        ]); 
        DB::table('tipoUsuario')->insert([
        'descripcion'=>'empleadomaquinaria',
        ]); 
            DB::table('region')->insert([
        'descripcion'=>'Guatemala',
        ]);
            DB::table('region')->insert([
        'descripcion'=>'Xela',
        ]);
            DB::table('region')->insert([
        'descripcion'=>'Zacapa',
        ]);
            DB::table('region')->insert([
        'descripcion'=>'Peten',
        ]);

        DB::table ('users')->insert([
          'name'  =>'Gerente General',
          'email' =>'gerentegeneral@systransport.com.gt',
          'password'  =>bcrypt('gerentegeneral'),
          'tipoUsuario_id'      =>1,
          'region_id'	=>1,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Gerente de Mineria',
          'email' =>'gerentemineria@systransport.com.gt',
          'password'  =>bcrypt('gerentemineria'),
          'tipoUsuario_id'      =>2,
          'region_id' =>1,
      ]);
        DB::table ('users')->insert([
          'name'  =>'Gerente de Productos',
          'email' =>'gerenteproductos@systransport.com.gt',
          'password'  =>bcrypt('gerenteproductos'),
          'tipoUsuario_id'      =>3,
          'region_id' =>1,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Gerente de Maquinaria',
          'email' =>'gerentemaquinaria@systransport.com.gt',
          'password'  =>bcrypt('gerentemaquinaria'),
          'tipoUsuario_id'      =>4,
          'region_id' =>1,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Usuario de Mineria',
          'email' =>'usuariomineria@systransport.com.gt',
          'password'  =>bcrypt('usuariomineria'),
          'tipoUsuario_id'      =>5,
          'region_id' =>1,
      ]);
        DB::table ('users')->insert([
          'name'  =>'Usuario de Productos',
          'email' =>'usuarioproductos@systransport.com.gt',
          'password'  =>bcrypt('usuarioproductos'),
          'tipoUsuario_id'      =>6,
          'region_id' =>1,
      ]);



        DB::table ('users')->insert([
          'name'  =>'Empleado de Mineria',
          'email' =>'empleadomineria@systransport.com.gt',
          'password'  =>bcrypt('empleadomineria'),
          'tipoUsuario_id'      =>8,
          'region_id' =>1,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Empleado de Productos',
          'email' =>'empleadoproductos@systransport.com.gt',
          'password'  =>bcrypt('empleadoproductos'),
          'tipoUsuario_id'      =>9,
          'region_id' =>1,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Empleado de Maquinaria',
          'email' =>'empleadomaquinaria@systransport.com.gt',
          'password'  =>bcrypt('empleadomaquinaria'),
          'tipoUsuario_id'      =>10,
          'region_id' =>1,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Usuario de Maquinaria 1',
          'email' =>'usuariomaquinaria1@systransport.com.gt',
          'password'  =>bcrypt('usuariomaquinaria'),
          'tipoUsuario_id'      =>7,
          'region_id' =>1,
          'user_id'=>9,
      ]);

        DB::table ('users')->insert([
          'name'  =>'Usuario de Maquinaria 2',
          'email' =>'usuariomaquinaria2@systransport.com.gt',
          'password'  =>bcrypt('usuariomaquinaria'),
          'tipoUsuario_id'      =>7,
          'region_id' =>1,
      ]);


    }
}
