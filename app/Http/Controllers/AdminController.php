<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Role;
use App\Carrera;
use App\User;

class AdminController extends Controller
{
    public function adminDashboard() {
        return view('admin.dashboard');
    }
    public function indexUsuarios() {
        return view('usuarios.index');
    }

    public function crearUsuario() {
        $roles = Role::all()->get();
        $carreras = Carrera::all()->get();
        return view('usuarios.crear', [
            'roles' => $roles,
            'carreras' => $carreras
        ]);
    }

    public function guardarUsuario(Request $request) {
        $request->validate([
            'cedula' => 'required|integer',
            'nombres' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'password' => 'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'rol_id' => 'required|integer',
            'carrera_id' => 'required|integer',
        ]);
        $nuevoUsuario = new User([
            'cedula' => $request->input('cedula'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'password' => bcrypt($request->input('password')),
            'rol_id' => $request->input('rol_id'),
            'carrera_id' => $request->input('carrera_id '),
        ]);
        $nuevoUsuario->save();
        return redirect()->route('usuarios');
    }


    public function mostrarUsuario($userId) {
        $usuario = User::findOrFail($userId);
        $prestamos = count($usuario->prestamos()->get());
        return view('usuarios.usuario', [
            'usuario' => $usuario,
            'prestamos' => $prestamos
        ]);
    }

    public function editarUsuario($userId) {
        $usuario = User::findOrFail($userId);
        $carreras = Carrera::all();
        $roles = Role::all();
        return view('usuarios.editar', [
            'usuario' => $usuario,
            'carreras' => $carreras,
            'roles' => $roles
        ]);
    }


    public function actualizarUsuario(Request $request, $userId) {
        $usuario = User::findOrFail($userId);
        $request->validate([
            'cedula' => 'required|integer|unique:usuarios,cedula,' . $userId,
            'nombres' => 'required|string|min:3',
            'apellidos' => 'required|string|min:3',
            'password' => 'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'email' => 'required|email|unique:usuarios,email,' . $userId,
            'rol' => 'required|integer',
            'carrera' => 'required|integer',
        ]);
        $usuario->update([
            'cedula' => $request->input('cedula'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'rol_id' => $request->input('rol'),
            'carrera_id' => $request->input('carrera'),
        ]);
        return redirect('/usuarios/' . $userId);
    }


    // RECUROS PARA API

    public function getUsuarios() {
        $usuarios = User::all();
        $usuariosData = $usuarios->map(function($usuario) {
            $rol = $usuario->rol()->first();
            $carrera = $usuario->carrera()->first();
            return collect([
                'cedula' => $usuario->cedula,
                'nombres' => $usuario->nombres,
                'apellidos' => $usuario->apellidos,
                'carrera' => collect([
					'id' => $carrera->id,
					'nombre' => $carrera->carrera
				]),
                'rol' => collect([
					'id' => $rol->id,
					'nombre' => $rol->rol
				]),
            ]);
        });
        return response()->json($usuariosData);
    }

    public function postUsuario(Request $request) {
        $request->validate([
            'cedula' => 'required|integer|unique:usuarios,cedula',
            'nombres' => 'required|string|min:3|max:100',
            'apellidos' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:usuarios,email,',
            'password' => 'required|min:8|regex:/^(?=\S*[a-z])(?=\S*[!@#$&*])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
            'rol' => 'required|integer|min:1',
            'carrera' => 'required|integer|min:1',
        ]);
        $newUser = new User([
            'cedula' => $request->input('cedula'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rol_id' => $request->input('rol'),
            'carrera_id' => $request->input('carrera')
        ]);
        $newUser->save();
        return response('Success', 200);
    }
}