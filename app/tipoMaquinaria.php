<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoMaquinaria extends Model
{
    protected $table = 'tipoMaquinaria';

     protected $fillable = ['id', 'descripcion'];

	 public function maquinarias()
        {
        return $this->hasMany('App\maquinaria');
        }
}
