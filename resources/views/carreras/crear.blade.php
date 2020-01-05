@extends('layouts.app')

@section('title', 'Nueva carrera')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Nueva carrera</div>

                <div class="card-body">
                <form method="POST" action="{{ '/carreras' }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">Carrera</label>

                            <div class="col-md-6">
                                <input id="carrera" type="text" class="form-control col-md-12 @error('carrera') is-invalid @enderror" name="carrera" value="" required autofocus>

                                @error('carrera')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row mb-0 col-md-12 d-flex justify-content-center">
                            <a class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%" href="/carreras">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary col-md-2 ml-1" style="max-width: 35%">
                                Agregar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
