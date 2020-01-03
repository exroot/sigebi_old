<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'rol'
    ];
    public function usuarios() {
        return $this->hasMany('App\User');
    }
}
