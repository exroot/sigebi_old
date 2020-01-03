<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Libro;
use App\Autor;
use App\Categoria;
use App\Estado;

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
    public function indexRoles() {
        return view('usuarios.index');
    }
    public function indexCarreras() {
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
    public function crearRol() {
        return view('roles.crear');
    }
    public function crearCarrera() {
        return view('carrera.crear');
    }

    public function guardarUsuario(Request $request) {
        $request->validate([
            'cedula' => 'required|integer',
            'nombres' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'rol_id' => 'required|integer',
            'carrera_id' => 'required|integer',
        ]);
        $nuevoUsuario = new User([
            'cedula' => $request->input('cedula'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'rol_id' => $request->input('rol_id'),
            'carrera_id' => $request->input('carrera_id '),
        ]);
        $nuevoUsuario->save();
        return redirect()->route('usuarios');
    }
    public function guardarRol(Request $request) {
        $request->validate([
            'rol' => 'required|min:4'
        ]);
        $nuevoRol = new Rol([
            'rol' => $request->input('rol')
        ]);
        $nuevoRol->save();
        return redirect()->route('roles');
    }
    public function guardarCarrera(Request $request) {
        $request->validate([
            'carrera' => 'required|min:4'
        ]);
        $nuevaCarrera = new Carrera([
            'carrear' => $request->input('carrera')
        ]);
        $nuevaCarrera->save();
        return redirect()->route('carreras');
    }

    public function mostrarUsuario($userId) {
        $usuario = Usuario::findOrFail($userId);
        $prestamos = count($usuario->prestamos()->get());
        return view('usuarios.usuario', [
            'usuario' => $usuario,
            'prestamos' => $prestamos
        ]);
    }
    public function mostrarRol($rolId) {
        $rol = Rol::findOrFail($rolId);
        $roles = Rol::all()->get();
        return view('roles.rol', [
            'rol' => $rol,
            'roles' => $roles
        ]);
    }
    public function mostrarCarrera($carreraId) {
        $carrera = Carrera::findOrFail($carreraId);
        $carreras = Carrera::all()->get();
        return view('carreras.carrera', [
            'carrera' => $carrera,
            'carreras' => $carreras
        ]);
    }

    public function editarUsuario($userId) {
        $usuario = Usuario::findOrFail($userId);
        return view('usuarios.editar', [
            'usuario' => $usuario
        ]);
    }
    public function editarRol($rolId) {
        $rol = Rol::findOrFail($rolId);
        return view('roles.editar', [
            'rol' => $rol
        ]);
    }
    public function editarCarrera($carreraId) {
        $carrera = Carrera::findOrFail($carreraId);
        return view('carreras.editar', [
            'carrera' => $carrera
        ]);
    }

    public function actualizarUsuario(Request $request, $userId) {
        $usuario = Usuario::findOrFail($userId);
        $request->validate([
            'cedula' => 'required|integer|unique:usuarios,cedula,' . $userId,
            'nombres' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'email' => 'required|email|unique:usuarios,email,' . $userId,
            'rol_id' => 'required|integer',
            'carrera_id' => 'required|integer',
        ]);
        $datosActualizados = collect([
            'cedula' => $request->input('cedula'),
            'nombres' => $request->input('nombres'),
            'apellidos' => $request->input('apellidos'),
            'email' => $request->input('email'),
            'rol_id' => $request->input('rol_id'),
            'carrera_id' => $request->input('carrera_id '),
        ]);
        $usuario->update($datosActualizados);
        return redirect('/usuarios/' . $userId);
    }

    public function actualizarRol(Request $request, $rolId) {
        $rol = Rol::findOrDia($rolId);
        $request->validate([
            'rol' => 'required|min:4'
        ]);
        $datosActualizados = collect([
            'rol' => $request->input('rol')
        ]);
        return redirect('/roles/' . $rolId);
    }

    public function actualizarCarrera(Request $request, $carreraId) {
        $carrera = Carrera::findOrFail($carreraId);
        $request->validate([
            'carrera' => 'required|min:4'
        ]);
        $datosActualizados = collect([
            'carrera' => $request->input('carrera')
        ]);
        return redirect('/carreras/' . $carreraId);
    }

    // Biblioteca

    public function getPrestamosRealizados() {
        $prestamosRealizados = Prestamo::all()->filter(function($prestamo, $i){
            return $prestamo->fecha_de_entrega != null;
        });
        $data = $prestamosRealizados->map(function($prestamo, $i) {
            return collect([
                'id' => $prestamo->id,
                'usuario' => collect([
                    'cedula' => $prestamo->cedula,
                    'nombres' => $prestamo->usuario()->first()->nombres,
                ]),
                'copia' => collect([
                    'id' => $prestamo->copia()->first()->id,
                    'libro' => $prestamo->copia()->first()->libro()->first()->titulo,
                ]),
                'fecha_de_prestamo' => $prestamo->fecha_de_prestamo,
                'fecha_a_retornar' => $prestamo->fecha_a_retornar,
                'fecha_de_entrega' => $prestamo->fecha_de_entrega,
            ]);
        });

        return response()->json($data);
    }

    public function getPrestamosActivos() {
        $prestamosActivos = Prestamo::all()->filter(function($prestamo, $i){
            return $prestamo->fecha_de_entrega == null;
        });
        $data = $prestamosActivos->map(function($prestamo, $i) {
            return collect([
                'id' => $prestamo->id,
                'usuario' => collect([
                    'cedula' => $prestamo->cedula,
                    'nombres' => $prestamo->usuario()->first()->nombres,
                ]),
                'copia' => collect([
                    'id' => $prestamo->copia()->first()->id,
                    'libro' => $prestamo->copia()->first()->libro()->first()->titulo,
                ]),
                'fecha_de_prestamo' => $prestamo->fecha_de_prestamo,
                'fecha_a_retornar' => $prestamo->fecha_a_retornar,
            ]);
        });

        return response()->json($data);
    }

    public function getCategorias() {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }
    public function getEstados() {
        $estados = Estado::all();
        return response()->json($estados);
    }

    // Usuarios
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
    public function getRoles() {
        $roles = Role::all();
        return response()->json($roles);
    }
    public function getCarreras() {
        $carreras = Carrera::all();
        return response()->json($carreras);
    }
}
