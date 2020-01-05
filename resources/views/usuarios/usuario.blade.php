@extends('layouts.app')

@section('title', 'SIGEBI | Usuario | ' . $usuario->cedula)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>{{ $usuario->nombres . ' ' . $usuario->apellidos }}</h2>
            
            <div class="ml-auto">
                <a href="/admin/usuarios">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/admin/usuarios/' . $usuario->cedula . '/editar'}}">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Datos personales:</h4>
                <p>Cedula: {{ $usuario->cedula}}</p>
                <p>Nombres: {{ $usuario->nombres}}</p>
                <p>Apellidos: {{ $usuario->apellidos}}</p>
                <p>Carrera: {{ $usuario->carrera->carrera}}</p>
                <p>Registrado desde: {{ explode(' ', $usuario->created_at)[0] }}</b></p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                <h4>Datos biblioteca:</h4>
                <p>Prestamos realizados: {{ $prestamos }}</p>
                <p>Rol: <b>{{ $usuario->rol->rol}}</b></p>
            </div>
        </div>
    </div>
@endsection