<?php

namespace App\Http\Controllers;

use App\Copia;
use App\Estado;
use App\Libro;
use Illuminate\Http\Request;

class CopiaController extends Controller
{

    public function index() {
        return view('copias.index');
    }

    public function crear() {
        $estados = Estado::all();
        $libros = Libro::all();
        return view('copias.crear', [
            'estados' => $estados,
            'libros' => $libros
        ]);
    }
    
    public function guardar(Request $request) {
        $request->validate([
            'cota' => 'required|min:5|max:255',
            'estado' => 'required|integer',
            'libro' => 'required|integer', 
        ]);
        $nuevaCopia = new Copia([
            'cota' => $request->input('cota'),
            'estado_id' => $request->input('estado'),
            'libro_id' => $request->input('libro')
        ]);
        $nuevaCopia->save();
        return redirect('/copias');
    }
    
    public function mostrar($copiaId) {
        $copia = Copia::findOrFail($copiaId);
        return view('copias.copia', [
            'copia' => $copia
        ]);
    }
    public function editar($copiaId) {
        $estados = Estado::all();
        $libros = Libro::all();
        $copia = Copia::findOrFail($copiaId);
        return view('copias.editar', [
            'copia' => $copia,
            'estados' => $estados,
            'libros' => $libros
        ]);
    }
    public function actualizar(Request $request, $copiaId) {
        $copia = Copia::findOrFail($copiaId);
        $request->validate([
            'cota' => 'required|min:5|max:255',
            'estado' => 'required|integer',
            'libro' => 'required|integer',
        ]);
        $copia->update([
            'cota' => $request->input('cota'),
            'estado_id' => $request->input('estado'),
            'libro_id' => $request->input('libro')
        ]);
        return redirect('/copias/'. $copiaId);
    }

    // RECURSO PARA API
    public function getCopias() {
        $copias = Copia::all();
        $copiasData = $copias->map(function($copia) {
            $libro = $copia->libro()->first();
            // Eusebio Gleason == estado 1 == disponible
            $disponibilidad = $copia->estado()->first()->estado == 'Eusebio Gleason' ? true : false;
            return collect([
                'id' => $copia->id,
                'cota' => $copia->cota,
                'libro' => collect([
                    'id' => $libro->id,
                    'titulo' => $libro->titulo
                ]),
                'estado' => $disponibilidad
            ]);
        });
        return response()->json($copiasData);
    }
}
