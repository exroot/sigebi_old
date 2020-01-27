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
            'estado' => 'required|integer|min:1',
            'libro' => 'required|integer|min:1',
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
        $copiasConTitulos = $copias->map(function($copia){
            return [
                'id' => $copia->id,
                'cota' => $copia->cota,
                'libro' => [
                    'id' => $copia->libro_id,
                    'titulo' => $copia->libro()->first()->titulo
                ],
                'estado_id' => $copia->estado_id 
            ];
        });
        return response()->json($copiasConTitulos, 200);
    }

    public function postCopias(Request $request) {
        $request->validate([
            'cota' => 'required|min:5|max:255',
            'estado' => 'required|integer|min:1',
            'libro' => 'required|integer|min:1', 
        ]);
        $nuevaCopia = new Copia([
            'cota' => $request->input('cota'),
            'estado_id' => $request->input('estado'),
            'libro_id' => $request->input('libro')
        ]);
        $nuevaCopia->save();
        return response('Success', 200); 
    }
}
