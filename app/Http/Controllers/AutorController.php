<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutorController extends Controller
{
    public function index() {
        return view('autores.index');
    }

    public function crear() {
        return view('autores.crear');
    }

    public function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);
        $nuevoAutor = new Autor([
            'nombre' => $request->input('nombre')
        ]);
        $nuevoAutor->save();
        return redirect('/autores');
    }

    public function mostrar($autorId) {
        $autor = Autor::findOrFail($autorId);
        return view('autores.autor', [
            'autor' => $autor
        ]); 
    }

    public function editar($autorId) {
        $autor = Autor::findOrFail($autorId);
        return view('autores.editar', [
            'autor' => $autor
        ]); 
    }

    public function actualizar(Request $request, $autorId) {
        $autor = Autor::findOrFail($autorId);
        $request->validate([
            'nombre' => 'required|min:4'
        ]);
        $autor->update([
            'nombre' => $request->input('nombre')
        ]);
        return redirect('/autores/' . $autorId);
    }


    // RECURSO PARA API
    public function getAutores() {
        $autores = Autor::all();
        $autoresData = $autores->map(function($autor) {
            $numeroDeLibros = count($autor->libros()->get());
            return [
                'id' => $autor->id,
                'nombre' => $autor->nombre,
                'libros' => $numeroDeLibros
            ];
        });
        return response()->json($autoresData);
    }

    public function postAutores(Request $request) {
        $request->validate([
            'nombre' => 'required|min:3'
        ]);
        $nuevoAutor = new Autor([
            'nombre' => $request->input('nombre')
        ]);
        $nuevoAutor->save();
        return response('Success', 200);
    }
}
