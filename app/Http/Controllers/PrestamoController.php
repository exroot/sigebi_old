<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Copia;
use App\User;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    public function indexActivos() {
        return view('prestamos.activos.index');
    }
    public function indexRealizados() {
        return view('prestamos.realizados.index');
    }
    public function mostrar($prestamoId) {
        $prestamo = Prestamo::findOrFail($prestamoId);
        return view('prestamos.prestamo', [
            'prestamo' => $prestamo
        ]);
    }
    public function crear() {
        $copias = Copia::all();
        $usuarios = User::all();
        return view('prestamos.crear', [
            'copias' => $copias,
            'usuarios' => $usuarios
        ]);
    }

    public function guardar(Request $request) {
        $request->validate([
            'copia' => 'required|integer',
            'cedula' => 'required|integer|min:999999'
        ]);
        $copiaId = $request->input('copia');
        $copia = Copia::findOrFail($copiaId);
        $prestamo = new Prestamo([
            'cedula' => $request->input('cedula'),
            'copia_id' => $request->input('copia'),
            'observacion' => '',
            'fecha_de_prestamo' => Carbon::now(),
            'fecha_a_retornar' => Carbon::now()->addHours(8),
        ]);
        $prestamo->save();
        $copia->update([
            'estado_id' => 2
        ]);
        return redirect('/prestamos/activos');
    }

    // RECURSOS PARA API
    public function getPrestamos() {
        $prestamos = Prestamo::all();
        return response()->json($prestamos);
    }

    public function postPrestamo(Request $request) {
        $request->validate([
            'copia' => 'required|integer|min:1',
            'cedula' => 'required|integer|min:999999'
        ]);
        $copiaId = $request->input('copia');
        $copia = Copia::findOrFail($copiaId);
        $nuevoPrestamo = new Prestamo([
            'copia_id' => $request->input('copia'),
            'cedula' => $request->input('cedula'),
            'observacion' => '',
            'fecha_de_prestamo' => Carbon::now(),
            'fecha_a_retornar' => Carbon::now()->addHours(8),
        ]);
        $nuevoPrestamo->save();
        $copia->update([
            'estado_id' => 2
        ]);
        return response('Success', 200);
    }

    public function getPrestamosRealizados() {
        $prestamosRealizados = Prestamo::all()->where('fecha_de_entrega', '!=', null)->values();
        return response()->json($prestamosRealizados);
    }

    public function getPrestamosActivos() {
        $prestamosActivos = Prestamo::all()->where('fecha_de_entrega', '==', null)->values();
        return response()->json($prestamosActivos);
    }

    public function retornar($prestamoId) {
        $prestamo = Prestamo::findOrFail($prestamoId);
        return view('prestamos.retornar', [
            'prestamo' => $prestamo
        ]);
    }

    public function guardarRetorno(Request $request, $prestamoId) {
        $prestamo = Prestamo::findOrFail($prestamoId);
        $copiaId = $prestamo->copia_id;
        $copia = Copia::findOrFail($copiaId);
        $prestamo->update([
            'fecha_de_entrega' => Carbon::now(),
        ]);
        $copia->update([
            'estado_id' => 1
        ]);
        return redirect('/prestamos/realizados');
    }
}
