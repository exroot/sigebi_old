@extends('layouts.app')

@section('title', 'Retornar préstamo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">Préstamo</div>

                <div class="card-body">
                <form method="POST" action="{{ '/prestamos/' . $prestamo->id }}">
                    {{ csrf_field() }}

                    <div class="form-group row mt-2">
                        <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>
                        
                        <div class="col-md-6 mt">
                        <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ $prestamo->cedula }}" required autofocus disabled>

                            @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label for="copia" class="col-md-4 col-form-label text-md-right">Copia</label>
                        
                        <div class="col-md-6 mt">
                        <input id="copia" type="text" class="form-control @error('copia') is-invalid @enderror" name="copia" value="{{ $prestamo->copia_id }}" required disabled>

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
                                Confirmar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
