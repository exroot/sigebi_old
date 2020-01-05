@extends('layouts.app')

@section('title', 'SIGEBI | Rol | ' . $rol->id)
@section('content')
    <div class="container mt-4">
        <div class="d-flex" style="padding-top: 15px;">
            <h2>{{ $rol->rol }}</h2>
            
            <div class="ml-auto">
                <a href="/admin/roles">
                    <button class="btn btn-primary">Regresar</button>
                </a>
                <a href="{{'/admin/roles/' . $rol->id . '/editar'}}">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
            </div>
        </div>
    </div>
@endsection