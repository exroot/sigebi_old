@extends('layouts.app')

@section('title', 'SIGEBI | Autores | ' . $autor->nombre)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>{{ $autor->nombre }}</h2>
            
            <div class="ml-auto">
                <a href="/autores">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/autores/' . $autor->id . '/editar'}}">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Descripcion</h4>
                <p>Página del autor.</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                    <h4>Libros del autor:</h4>
                    <ul>
                        @forelse ($autor->libros as $libro)
                            <li>
                                <a href={{ '/libros/' . $libro->id }}>{{ $libro->titulo }}</a>
                            </li>
                        @empty
                            <li>
                                Este autor no tiene libros.
                            </li>
                        @endforelse
                    </ul>
            </div>
        </div>
    </div>
@endsection