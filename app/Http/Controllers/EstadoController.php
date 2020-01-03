<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;

class EstadoController extends Controller
{
    public function index() {
        return view('estados.index');
    }

    public function crear() {
        return view('estados.crear');
    }
    
    public function guardar(Request $request) {
        $request->validate([
            'estado' => 'required|min:4|max:255'
        ]);
        $nuevoEstado = new Estado([
            'estado' => $request->input('estado')
        ]);
        $nuevoEstado->save();
        return redirect('/estados');
    }

    public function mostrar($estadoId) {
        $estado = Estado::findOrFail($estadoId);
        return view('estados.estado', [
            'estado' => $estado
        ]);
    }
    public function editar($estadoId) {
        $estado = Estado::findOrFail($estadoId);
        return view('estados.editar', [
            'estado' => $estado
        ]);
    }

    public function actualizar(Request $request, $estadoId) {
        $estado = Estado::findOrFail($estadoId);
        $request->validate([
            'estado' => 'required|min:4|max:255'
        ]);
        $estado->update([
            'estado' => $request->input('estado')
        ]);
        return redirect('/estados/' . $estadoId);
    }
    
    // RECURSO PARA API
    public function getEstados() {
        $estados = Estado::all();
        return response()->json($estados);
    }
}
