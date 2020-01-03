@extends('layouts.app')

@section('title', 'SIGEBI | Copia | ' . $copia->id)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>Copia Numero: {{ $copia->id }}</h2>
            
            <div class="ml-auto">
                <a href="/categorias">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/copias/' . $copia->id . '/editar'}}">
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
                    Libro: <a href="{{ '/libros/' . $copia->libro->id}}">{{ $copia->libro->titulo }}</a>
                </p>
                <p>
                    Cota: {{ $copia->cota }}
                </p>
                <p>
                    Estado: {{ $copia->estado->estado }}
                </p>
            </div>
        </div>
    </div>
@endsection