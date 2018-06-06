<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaccion extends Model
{
     protected $table = 'transaccion';

     protected $fillable = ['id', 'fecha', 'total', 'user_id', 'estadoTransaccion_id', 'tipoTransaccion_id', 'maquinaria_id'];

	 
	 public function user()
     {
     return $this->belongsTo('App\User', 'user_id');
     }
     
     public function estadoTransaccion()
     {
     return $this->belongsTo('App\estadoTransaccion', 'estadoTransaccion_id');
     }

     public function tipoTransaccion()
     {
     return $this->belongsTo('App\tipoTransaccion', 'tipoTransaccion_id');
     }

      public function maquinaria()
     {
     return $this->belongsTo('App\maquinaria', 'maquinaria_id');
     }

}
