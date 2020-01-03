@extends('layouts.app')

@section('title', 'SIGEBI | Iniciar sesión')

@section('content')
<div class="container" id="auth">
    <h2 class="row justify-content-center mt-4" id="title">Iniciar sesión</h2>
    <div class="row justify-content-center">
        <div class="ml-auto mr-auto mt-5" id="card-container">
            <div class="card card-login shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="cedula" class="col-md-12 col-form-label text-md-left">{{ __('Cédula') }}</label>
                            <div class="col-md-12">
                                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-left">{{ __('Contraseña') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-4 mb-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary col-md-12" >
                                        <!-- Correct -->
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mt-1 d-flex justify-content-between">
                                <div>
                                    @if (Route::has('password.request'))
                                        <p>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Olvidé mi contraseña') }}
                                            </a>
                                        </p>
                                    @endif
                                </div>
                                <div>
                                    <p>No te has registrado?
                                        <a class="btn btn-link" href="/register">
                                            Registrate
                                        </a>
                                    <p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
