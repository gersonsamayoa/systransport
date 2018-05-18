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
    protected $fillable = ['name', 'email', 'password', 'type', 'region'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

     public function usuariomineria()
    {
        return $this->type==='usuariomineria';
    }

    public function usuarioproductos()
    {
        return $this->type==='usuarioproductos';
    }

    public function usuarioconstruccion()
    {
        return $this->type==='usuarioconstruccion';
    }
    public function gerentemineria()
    {
        return $this->type==='gerentemineria';
    }

    public function gerenteproductos()
    {
        return $this->type==='gerenteproductos';
    }

    public function gerenteconstruccion()
    {
        return $this->type==='gerenteconstruccion';
    }
    public function gerentegeneral()
    {
        return $this->type==='gerentegeneral';
    }

    public function coban()
    {
        return $this->type==='coban';
    }
    public function progreso()
    {
        return $this->type==='progreso';
    }
    public function quetzaltenango()
    {
        return $this->type==='quetzaltenango';
    }
    public function peten()
    {
        return $this->type==='peten';
    }
    public function zacapa()
    {
        return $this->type==='zacapa';
    }
    public function huehuetenango()
    {
        return $this->type==='huehuetenango';
    }
    public function general()
    {
        return $this->type==='general';
    }
}
