@extends('layouts.app')

@section('title', 'Nuevo libro')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">Nuevo libro</div>

                <div class="card-body">
                <form method="POST" action="/libros">

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>

                            <div class="col-md-6">
                                <input id="input-title" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="" required autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" name="descripcion" type="text"  rows="8" class="form-control @error('descripcion') is-invalid @enderror" required></textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="autor" class="col-md-4 col-form-label text-md-right">Autor</label>

                            <div class="col-md-6">
                                <select name="autor" class="form-control col-md-12 text-md-center" required>
                                    <option hidden disabled selected value> -- selecciona una opción -- </option>
                                    @forelse ($autores as $autor)
                                        <option value="{{ $autor->id }}">{{ $autor->nombre }}</option> 
                                    @empty
                                        <option value="">No se encontraron autores.</option>
                                    @endforelse
                                </select> 
                                @error('autor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="Categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <select name="categoria" class="form-control col-md-12 text-md-center" required>
                                    <option hidden disabled selected value> -- selecciona una opción -- </option>
                                    @forelse ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @empty
                                        <option value="">No se encontraron categorias.</option>
                                    @endforelse
                                </select>
                                @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <hr>
                        <div class="form-group row mt-2 mb-0 col-md-12 d-flex justify-content-center">
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="/libros">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary col-md-2 ml-1" style="max-width: 35%">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
