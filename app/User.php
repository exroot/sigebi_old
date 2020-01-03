<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'usuarios';
    protected $primaryKey = 'cedula';
    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'email', 
        'password',
        'rol_id',
        'carrera_id',
    ];

    public function rol() {
        return $this->belongsTo('App\Role');
    }
    public function carrera() {
        return $this->belongsTo('App\Carrera');
    }

    public function prestamos() {
        return $this->hasMany('App\Prestamo');
    }

    public function esAdmin() {
        return $this->rol_id == 1;
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
