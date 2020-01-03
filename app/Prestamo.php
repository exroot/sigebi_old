<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'cedula',
        'copia_id',
        'observacion',
        'fecha_de_prestamo',
        'fecha_a_retornar',
        'fecha_de_entrega'
    ];
    public $timestamps = false;
    public function usuario() {
        return $this->belongsTo('App\User', 'cedula');
    }
    public function copia() {
        return $this->belongsTo('App\Copia');
    }
}
