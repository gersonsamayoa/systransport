<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'tipoUsuario_id', 'region_id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function region()
    {
    return $this->belongsTo('App\region', 'region_id');
    }

    public function tipoUsuario()
    {
    return $this->belongsTo('App\tipoUsuario', 'tipoUsuario_id');
    }

    public function maquinarias()
    {
    return $this->hasMany('App\maquinaria');
    }

    public function transacciones()
    {
    return $this->hasMany('App\transaccion');
    }

    public function gerentegeneral()
    {
        return $this->tipoUsuario->descripcion==='gerentegeneral';
    }

    public function gerentemineria()
    {
        return $this->tipoUsuario->descripcion==='gerentemineria';
    }

    public function gerenteproductos()
    {
        return $this->tipoUsuario->descripcion==='gerenteproductos';
    }

    public function gerentemaquinaria()
    {
        return $this->tipoUsuario->descripcion==='gerentemaquinaria';
    }
     public function usuariomineria()
    {
        return $this->tipoUsuario->descripcion==='usuariomineria';
    }
    public function usuarioproductos()
    {
        return $this->tipoUsuario->descripcion==='usuarioproductos';
    }   

    public function usuariomaquinaria()
    {
        return $this->tipoUsuario->descripcion==='usuariomaquinaria';
    }

    public function empleadomineria()
    {
        return $this->tipoUsuario->descripcion==='empleadomineria';
    }

    public function empleadoproductos()
    {
        return $this->tipoUsuario->descripcion==='empleadoproductos';
    }

    public function empleadomaquinaria()
    {
        return $this->tipoUsuario->descripcion==='empleadomaquinaria';
    }

    public function obtenerregion(){
        return $this->region_id;
    }

    public function obtenerId()
    {
        return $this->id;
    }
        
}
