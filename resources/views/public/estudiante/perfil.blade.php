@extends('public.protected.index')

@section('card_body')
    <div class="row">
        <div class="col-12 mb-4">
            <h1><span class="text-muted">Gestiona tu</span> Información</h1>
        </div>
        <div class="col-12 col-md-10 mx-auto">
            <form id="form-edit-perfil" action="{{ route('public_estudiante.update', $perfil) }}" method="POST"
                class="form-estudiantes form-row">
                @csrf
                <input type="hidden" name="id" value="{{ $perfil->id }}">
                @method('PUT')
                {{-- @include('public.fragmentos._estudiante._form_perfil_simple', $perfil) --}}
                @include('dashboard.estudiantes.framentos.form-perfil', $perfil)
                {{-- @include('public.fragmentos._estudiante._form_clave', $perfil) --}}
            </form>
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <a href="{{ route('inicio_estudiante.index', ['tab' => 'cambio_clave']) }}">
                        <i class="fas fa-key mr-2"></i>
                        Cambiar Contraseña
                    </a>
                </div>
                <div class="col-12 col-md-6 mb-4 text-right">
                    <button type="button" onclick="$('#form-edit-perfil').submit();" class="btn btn-primary">
                        <i class="fas fa-pen mr-2"></i>
                        Editar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
