@extends('layouts.app')

@section('title', 'SIGEBI | Estado | ' . $estado->estado)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>{{ $estado->estado }}</h2>
            
            <div class="ml-auto">
                <a href="/estados">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/estados/' . $estado->id . '/editar'}}">
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
                    Libros: {{ count($estado->libros) }} 
                </p>
            </div>
        </div>
    </div>
@endsection