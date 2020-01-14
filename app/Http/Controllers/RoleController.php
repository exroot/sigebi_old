<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index() {
        return view('roles.index');
    }

    public function crearRol() {
        return view('roles.crear');
    }

    public function guardarRol(Request $request) {
        $request->validate([
            'rol' => 'required|string|min:4'
        ]);
        $nuevoRol = new Role([
            'rol' => $request->input('rol')
        ]);
        $nuevoRol->save();
        return redirect()->route('roles');
    }

    public function mostrarRol($rolId) {
        $rol = Role::findOrFail($rolId);
        $roles = Role::all();
        return view('roles.rol', [
            'rol' => $rol,
            'roles' => $roles
        ]);
    }

    public function editarRol($rolId) {
        $rol = Role::findOrFail($rolId);
        return view('roles.editar', [
            'rol' => $rol
        ]);
    }

    public function actualizarRol(Request $request, $rolId) {
        $rol = Role::findOrFail($rolId);
        $request->validate([
            'rol' => 'required|string|min:4'
        ]);
        $rol->update([
            'rol' => $request->input('rol')
        ]);
        return redirect('/roles/' . $rolId);
    }

    // RECURSOS PARA API
    public function getRoles() {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function postRol(Request $request) {
        $request->validate([
            'rol' => 'required|string|min:4'
        ]);

        $newRol = new Role([
            'rol' => $request->input('rol')
        ]);

        $newRol->save();
        return response('Success', 200);
    }


}
