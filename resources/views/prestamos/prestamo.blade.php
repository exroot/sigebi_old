@extends('layouts.app')

@section('title', 'SIGEBI | Prestamo | ' . $prestamo->id)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>Prestamo Numero: {{ $prestamo->id }}</h2>
            
            <div class="ml-auto">
                <a href="/prestamos">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/prestamos/' . $prestamo->id . '/editar'}}">
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
                    Usuario: <a href="{{ '/usuarios/' . $prestamo->cedula }}">{{ $prestamo->cedula }}</a>
                </p>
                <p>
                    Copia: <a href="{{ '/copias/' . $prestamo->copia_id}}">{{ $prestamo->copia_id }}</a>
                </p>
                <p>
                    Fecha de préstamo: {{ $prestamo->fecha_de_prestamo }}
                </p>
                <p>
                    Fecha a retornar: {{ $prestamo->fecha_a_retornar }}
                </p>
                <p>
                    Fecha de entrega: {{ $prestamo->fecha_de_entrega ? $prestamo->fecha_de_entrega : "Aún no se ha entregado." }}
                </p>
            </div>
        </div>
    </div>
@endsection