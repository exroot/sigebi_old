<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'estado'
    ];
    public function libros() {
        return $this->belongsToMany('App\Libro', 'copias');
    }
}
