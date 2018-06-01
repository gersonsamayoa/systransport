<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoTransaccion extends Model
{
     protected $table = 'tipoTransaccion';

     protected $fillable = ['id', 'descripcion'];

	 public function transacciones()
        {
        return $this->hasMany('App\transaccion');
        }
}
