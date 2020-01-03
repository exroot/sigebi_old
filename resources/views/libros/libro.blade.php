@extends('layouts.app')

@section('title', 'SIGEBI | Libros | ' . $libro->titulo)
@section('content')
    <div class="container mt-4">
        <div class="head d-flex" style="padding-top: 15px;">
            <h2>{{ $libro->titulo }}</h2>
            <div class="actions ml-auto">
                <a href="/libros">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{ '/libros/' . $libro->id . '/editar' }}">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Descripción</h4>
                <p>{{ $libro->descripcion }}</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                    <h4>Data:</h4>
                    <p>Autor: <a href={{ '/autores/' . $libro->autor->id }}> {{ $libro->autor->nombre }} </a></p>
                    <p>Categoria: {{ $libro->categoria->categoria }}</p>
                    <p>Estado: <span class={{ $disponible ? 'status-icon-sucess' : 'status-icon-danger' }}> {{ $disponible ? 'Disponibe' : 'No disponible' }}</span></p>
            </div>
        </div>
        <hr>
            <h4>Libros similares:</h4>
            <ul>
                
                @forelse ($libro->categoria->libros as $libroSimilar)
                    {{-- Busca libros de la misma categoria --}}
                    @if ( count($libro->categoria->libros) > 1)
                        @if ($libroSimilar->id != $libro->id)
                            {{-- Libros similares exceptuandose el mismo --}}
                            <li>
                                <a href={{ '/libros/' . $libroSimilar->id }}>{{ $libroSimilar->titulo }}</a>
                            </li>
                        @endif
                    @else
                        <p>No hay libros similares o que compartan  la misma categoría.</p>
                    @endif
                    @empty
                    @endforelse
            </ul>
        <hr>
        <h4>( {{ count($copias) }} )  {{ count($copias) <= 1 ? 'Copia:' : 'Copias: ' }} </h4>
        <ul>
            @forelse ($copias as $copia)
                <li>
                    {{ $copia->estado_id == 1 ? 'Disponible' : 'Prestada' }}
                </li>
            @empty
                <li>
                    No hay copias de este libro en biblioteca.
                </li>
            @endforelse
        </ul>
    </div>
@endsection