@extends('layouts.app')

@section('title', 'Crear prestamo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">Nuevo prestamo</div>

                <div class="card-body">
                <form method="POST" action="/prestamos">
                    {{ csrf_field() }}

                        <div class="form-group row mt-2">
                            <label for="cedula_usuario" class="col-md-4 col-form-label text-md-right">Usuario</label>

                            <div class="col-md-6">
                                <select name="cedula_usuario" class="form-control col-md-12 text-md-center">
                                    <option hidden disabled selected value> -- selecciona una opción -- </option>
                                    @forelse ($usuarios as $usuario)
                                        <option value="{{ $usuario->cedula }}" >{{ $usuario->cedula }}</option> 
                                    @empty
                                        <option value="">No se encontraron usuarios registrados.</option>
                                    @endforelse
                                </select> 
                                @error('cedula_usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="copia" class="col-md-4 col-form-label text-md-right">Copia</label>

                            <div class="col-md-6">
                                <select name="copia" class="form-control col-md-12 text-md-center">
                                    <option hidden disabled selected value> -- selecciona una opción -- </option>
                                    @forelse ($copias as $copia)
                                        <option value="{{ $copia->id }}">{{ $copia->id . ' (' . $copia->libro->titulo . ')' }}</option> 
                                    @empty
                                        <option value="">No se encontraron copias.</option>
                                    @endforelse
                                </select> 
                                @error('copia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0 col-md-12 d-flex justify-content-center">
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="/prestamos">
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
