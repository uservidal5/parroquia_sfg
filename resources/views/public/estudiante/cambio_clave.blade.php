@extends('public.protected.index')

@section('card_body')
    <div class="row">
        <div class="col-12 mb-2">
            <a href="{{ route('inicio_estudiante.index', ['tab' => 'perfil']) }}">
                <i class="fas fa-angle-left mr-2"></i>
                Volver
            </a>
        </div>
        <div class="col-12 mb-4">
            <h1><span class="text-muted">Gestiona tu</span> Contraseña</h1>
        </div>
        <div class="col-12 col-md-10 mx-auto">
            <form id="form-edit-password" action="{{ route('public_estudiante.cambio_clave', $perfil) }}" method="POST"
                class="form-estudiantes form-row">
                <input type="hidden" name="id" value="{{ $perfil->id }}">
                @csrf
                @method('PUT')
                @include('dashboard.estudiantes.framentos.form-cambio-clave', $perfil)
            </form>
            <div class="row">
                <div class="col-12 text-right">
                    <button type="button" onclick="$('#form-edit-password').submit();" class="btn btn-warning">
                        <i class="fas fa-key mr-2"></i>
                        Actualizar Contraseña
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
