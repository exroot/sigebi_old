@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card shadow">
                <div class="card-header">Actualizar usuario</div>

                <div class="card-body">
                <form method="POST" action="{{ '/admin/usuarios/' . $usuario->cedula }}">
                    {{ csrf_field() }}

                    <div class="form-group row mt-2">
                        <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>

                        <div class="col-md-6">
                            <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ $usuario->cedula }}" required autofocus>

                            @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="form-group row mt-2">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ $usuario->nombres }}" required autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ $usuario->apellidos }}" required autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2 mt-2">
                            <label for="Carrera" class="col-md-4 col-form-label text-md-right">Carrera</label>

                            <div class="col-md-6">
                                <select name="carrera" class="form-control col-md-12 text-md-center">
                                    @forelse ($carreras as $carrera)
                                        <option value="{{ $carrera->id }}" @if ($carrera->id == $usuario->carrera->id) selected="selected" @endif >{{ $carrera->carrera }}</option> 
                                    @empty
                                        <option value="">No se encontraron carreras.</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mt-2 mt-2">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <select name="rol" class="form-control col-md-12 text-md-center">
                                    @forelse ($roles as $rol)
                                        <option value="{{ $rol->id }}" @if ($rol->id == $usuario->rol->id) selected="selected" @endif >{{ $rol->rol }}</option> 
                                    @empty
                                        <option value="">No se encontraron roles.</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-0 col-md-12 d-flex justify-content-center">
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="{{ '/admin/usuarios/' . $usuario->cedula }}">
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
