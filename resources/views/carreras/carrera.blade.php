@extends('layouts.app')

@section('title', 'SIGEBI | Carrera | ' . $carrera->id)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>{{ $carrera->carrera }}</h2>
            
            <div class="ml-auto">
                <a href="/admin/carreras">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/admin/carreras/' . $carrera->id . '/editar'}}">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Observaciones:</h4>
                <p>No tiene ninguna observación.</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                <h4>Data:</h4>
                <p>
                    Usuarios: {{ count($carrera->usuarios) }} 
                </p>
            </div>
        </div>
    </div>
@endsection