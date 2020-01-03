@extends('layouts.app')

@section('title', 'SIGEBI | Registro')

@section('content')
<div class="container" id="auth">
    <h2 class="row justify-content-center mt-4" id="title">Registro</h2>
    <div class="row justify-content-center">
        <div class="ml-auto mr-auto mt-5" id="card-container">
            <div class="card card-register shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <h5>Información personal:</h5>
                        <div class="row">

                            <div class="form-group row col-md-3">
                                <label for="cedula" class="col-md-12 col-form-label text-md-left">{{ __('Cédula') }}</label>

                                <div class="col-md-12">
                                    <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autofocus>

                                    @error('cedula')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-4">
                                <label for="nombres" class="col-md-12 col-form-label text-md-left">{{ __('Nombre(s)') }}</label>

                                <div class="col-md-12">
                                    <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

                                    @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-5">
                                <label for="apellidos" class="col-md-12 col-form-label text-md-left">{{ __('Apellido(s)') }}</label>

                                <div class="col-md-12">
                                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Contacto y seguridad: </h5>
                        <div class="row">
                            <div class="form-group row col-md-4">
                                <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-4">
                                <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Contraseña') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row col-md-4">
                                <label for="password-confirm" class="col-md-12 col-form-label text-md-left">{{ __('Confirmar contraseña') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group row">
                    <div class="col-md-12 mt-3 d-flex justify-content-center">
                        <div>
                            <p>Ya estás registrado?
                                <a class="btn btn-link" href="/login">
                                    Entra
                                </a>
                            <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
