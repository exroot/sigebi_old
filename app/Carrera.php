<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'carrera',
    ];
    public function usuarios() {
        return $this->hasMany('App\User');
    }
}
