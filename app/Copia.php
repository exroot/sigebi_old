<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copia extends Model
{
    protected $fillable = [
        'cota',
        'libro_id',
        'estado_id'
    ];
    public function libro() {
        return $this->belongsTo('App\Libro');
    }
    public function estado() {
        return $this->belongsTo('App\Estado');
    }
}
