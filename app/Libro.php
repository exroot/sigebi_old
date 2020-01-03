<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'autor_id',
        'categoria_id',
    ];
    public function autor() {
        return $this->belongsTo('App\Autor');
    }
    public function categoria() {
        return $this->belongsTo('App\Categoria');
    }
    public function copias() {
        return $this->hasMany('App\Copia');
    }

}
