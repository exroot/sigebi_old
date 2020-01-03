@extends('layouts.app')

@section('title', 'Editar copia')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Actualizar copia</div>

                <div class="card-body">
                <form method="POST" action="{{ '/copias/' . $copia->id }}">
                    {{ csrf_field() }}

                    <div class="form-group row mt-2">
                        <label for="cota" class="col-md-4 col-form-label text-md-right">Cota</label>
                        
                        <div class="col-md-6 mt">
                            <input id="cota" type="text" class="form-control @error('cota') is-invalid @enderror" name="cota" value="{{ $copia->cota }}" required autofocus>

                            @error('cota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                        <div class="form-group row mt-2">
                            <label for="libro" class="col-md-4 col-form-label text-md-right">Libro</label>

                            <div class="col-md-6">
                                <select name="libro" class="form-control col-md-12 text-md-center">
                                    @forelse ($libros as $libro)
                                        <option value="{{ $libro->id }}" @if ($copia->libro->id == $libro->id) selected="selected" @endif >{{ $libro->titulo }}</option> 
                                    @empty
                                        <option value="">No se encontraron libros.</option>
                                    @endforelse
                                </select> 
                                @error('libro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <select name="estado" class="form-control col-md-12 text-md-center">
                                    @forelse ($estados as $estado)
                                        <option value="{{ $estado->id }}" @if ($copia->estado->id == $estado->id) selected="selected" @endif >{{ $estado->estado }}</option> 
                                    @empty
                                        <option value="">No se encontraron estados.</option>
                                    @endforelse
                                </select> 
                                @error('estado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0 col-md-12 d-flex justify-content-center">
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="{{ '/copias/' . $copia->id }}">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary col-md-2 ml-1" style="max-width: 35%">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
