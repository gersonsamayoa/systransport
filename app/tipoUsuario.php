<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoUsuario extends Model
{
    
    protected $table = 'tipoUsuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'descripcion'];

    public function users()
        {
        return $this->hasMany('App\User');
        }

}
