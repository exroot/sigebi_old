@extends('layouts.app')

@section('title', 'SIGEBI | Categorias | ' . $categoria->categoria)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>{{ $categoria->categoria }}</h2>
            
            <div class="ml-auto">
                <a href="/categorias">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/categorias/' . $categoria->id . '/editar'}}">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Descripcion</h4>
                <p>Información de categoría.</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                    <h4>Libros sobre {{ $categoria->categoria }}:</h4>
                    <ul>
                        @forelse ($categoria->libros as $libro)
                            <li>
                                <a href={{ '/libros/' . $libro->id }}>{{ $libro->titulo }}</a>
                            </li>
                        @empty
                            <li>
                                Esta categoría no tiene libros.
                            </li>
                        @endforelse
                    </ul>
            </div>
        </div>
    </div>
@endsection