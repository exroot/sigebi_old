<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Autor;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function index() {
        return view('libros.index');
    }

    public function crear() {
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('libros.crear', [
            'autores' => $autores,
            'categorias' => $categorias
        ]);
    }

    public function guardar(Request $request) {
        $request->validate([
            'titulo' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            'categoria' => 'required|integer',
            'autor' => 'required|integer',
        ]);
        $nuevoLibro = new Libro([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->input('categoria'),
            'autor_id' => $request->input('autor')
        ]);
        $nuevoLibro->save();
        return redirect('/libros');
    }

    public function mostrar($libroId) {
        $libro = Libro::findOrFail($libroId);
        $copiasDelLibro = $libro->copias()->get();
        $copiasDisponibles = $copiasDelLibro->filter(function($copia) {
            return $copia->estado_id == 3;
        });
    
        return view('libros.libro', [
            'libro' => $libro,
            'copias' => $copiasDelLibro,
            'disponible' => count($copiasDisponibles) >= 1 ? true: false 
        ]); 
    }

    public function editar($libroId) {
        $libro = Libro::findOrFail($libroId);
        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('libros.editar', [
            'libro' => $libro,
            'autores' => $autores,
            'categorias' => $categorias
        ]); 
    }

    public function actualizar(Request $request, $libroId) {
        $libro = Libro::findOrFail($libroId);
        $request->validate([
            'titulo' => 'required|min:3|max:255',
            'descripcion' => 'required|min:3|max:255',
            'categoria' => 'required|integer',
            'autor' => 'required|integer',
        ]);
        $libro->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->input('categoria'),
            'autor_id' => $request->input('autor')
        ]);
        return redirect('/libros/' . $libroId);
    }
    
    public function getLibros() {
        $libros = Libro::all();
        $librosConAutores = $libros->map(function($libro) {
            $autorDelLibro = $libro->autor()->first();
            $copiasDelLibro = $libro->copias()->get();
            $copiasDisponibles = $copiasDelLibro->filter(function($copia) {
                return $copia->estado_id == 3;
            });
            return collect([
                'id' => $libro->id,
                'titulo' => $libro->titulo,
                'descripcion' => $libro->descripcion,
                'categoria_id' => $libro->categoria_id,
                'autor' => collect([
                    'id' => $autorDelLibro->id,
                    'nombre' => $autorDelLibro->nombre
                ]),
                'disponible' => count($copiasDisponibles) >= 1 ? true : false,
            ]);
        });
        return response()->json($librosConAutores);
    }

    public function postLibros(Request $request) {
        $request->validate([
            'titulo' => 'required|string|min:3|max:100',
            'descripcion' => 'string|min:3|max:100',
            'categoria' => 'required|integer|min:1',
            'autor' => 'required|integer|min:1'
        ]);
        $nuevoLibro = new Libro([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'categoria_id' => $request->input('categoria'),
            'autor_id' => $request->input('autor')
        ]);
        $nuevoLibro->save();
        return response('Sucess', 200);
    }
}
