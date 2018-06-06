<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maquinaria extends Model
{
    protected $table = 'maquinaria';

     protected $fillable = ['id', 'placa', 'costoPorDia', 'precio', 'imagen', 'user_id','estadoEquipo_id', 'tipoMaquinaria_id', 'region_id'];

	public function user()
    {
    return $this->belongsTo('App\User', 'user_id');
    }

    public function estadoEquipo()
    {
    return $this->belongsTo('App\estadoEquipo', 'estadoEquipo_id');
    }

    public function tipoMaquinaria()
    {
    return $this->belongsTo('App\tipoMaquinaria', 'tipoMaquinaria_id');
    }
}
