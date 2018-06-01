<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoTransaccion extends Model
{
    protected $table = 'estadoTransaccion';

     protected $fillable = ['id', 'descripcion'];

	 public function transacciones()
        {
        return $this->hasMany('App\transaccion');
        }
}
