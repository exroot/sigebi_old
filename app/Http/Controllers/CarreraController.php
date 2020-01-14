<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index() {
        return view('carreras.index');
    }

    public function crearCarrera() {
        return view('carreras.crear');
    }

    public function guardarCarrera(Request $request) {
        $request->validate([
            'carrera' => 'required|string|min:4'
        ]);
        $nuevaCarrera = new Carrera([
            'carrear' => $request->input('carrera')
        ]);
        $nuevaCarrera->save();
        return redirect()->route('carreras');
    }

    public function mostrarCarrera($carreraId) {
        $carrera = Carrera::findOrFail($carreraId);
        $carreras = Carrera::all();
        return view('carreras.carrera', [
            'carrera' => $carrera,
            'carreras' => $carreras
        ]);
    }

    public function editarCarrera($carreraId) {
        $carrera = Carrera::findOrFail($carreraId);
        return view('carreras.editar', [
            'carrera' => $carrera
        ]);
    }

    public function actualizarCarrera(Request $request, $carreraId) {
        $carrera = Carrera::findOrFail($carreraId);
        $request->validate([
            'carrera' => 'required|string|min:4'
        ]);
        $carrera->update([
            'carrera' => $request->input('carrera')
        ]);
        return redirect('/carreras/' . $carreraId);
    }

    // RECURSOS PARA API
    public function getCarreras() {
        $carreras = Carrera::all();
        return response()->json($carreras);
    }

    public function postCarrera(Request $request) {
        $request->validate([
            'carrera' => 'required|string|min:4'
        ]);
        $nuevaCarrera = new Carrera([
            'carrera' => $request->input('carrera')
        ]);
        $nuevaCarrera->save();
        return response('Success', 200);
    }
}
