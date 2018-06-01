<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoEquipo extends Model
{
     protected $table = 'estadoEquipo';

     protected $fillable = ['id', 'descripcion'];

	 public function maquinarias()
        {
        return $this->hasMany('App\maquinaria');
        }
}
