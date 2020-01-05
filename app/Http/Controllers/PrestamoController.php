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
            'cedula_usuario' => 'required|integer'
        ]);
        $copiaId = $request->input('copia');
        $copia = Copia::findOrFail($copiaId);
        $prestamo = new Prestamo([
            'cedula' => $request->input('cedula_usuario'),
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
    public function getPrestamosRealizados() {
        $prestamosData = array();
        $prestamosRealizados = Prestamo::all()->where('fecha_de_entrega', '!=', null);
        foreach ($prestamosRealizados as $prestamo) {
            array_push($prestamosData, $prestamo);
        }
        return response()->json($prestamosData);
    }

    public function getPrestamosActivos() {
        $prestamosData = array();
        $prestamosActivos = Prestamo::all()->where('fecha_de_entrega', '==', null);
        foreach ($prestamosActivos as $prestamo) {
            array_push($prestamosData, $prestamo);
        }
        return response()->json($prestamosData);
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
