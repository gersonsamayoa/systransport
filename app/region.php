<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class region extends Model
{
       protected $table = 'region';
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

    public function maquinarias()
        {
        return $this->hasMany('App\maquinaria');
        }
}
