<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function index() {
        return view('categorias.index');
    }
    public function mostrar($categoriaId) {
        $categoria = Categoria::findOrFail($categoriaId);
        return view('categorias.categoria', [
            'categoria' => $categoria
        ]);
    }
    public function crear() {
        return view('categorias.crear');
    }

    public function guardar(Request $request) {
        $request->validate([
            'categoria' => 'required|min:4'
        ]);
        $nuevaCategoria = new Categoria([
            'categoria' => $request->input('categoria')
        ]);
        $nuevaCategoria->save();
        return redirect('/categorias');
    }

    public function editar($categoriaId) {
        $categoria = Categoria::findOrFail($categoriaId);
        return view('categorias.editar', [
            'categoria' => $categoria
        ]);
    }

    public function actualizar(Request $request, $categoriaId) {
        $categoria = Categoria::findOrFail($categoriaId);
        $request->validate([
            'categoria' => 'required|min:4|max:255'
        ]);
        $categoria->update([
            'categoria' => $request->input('categoria')
        ]);
        return redirect('/categorias/' . $categoriaId);
    }
    
    // RECURSO PARA API
    public function getCategorias() {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }
}
