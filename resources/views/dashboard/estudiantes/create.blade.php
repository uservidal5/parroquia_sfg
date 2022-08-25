@extends('template.dashboard')


@section('page_title')
    Estudiantes | Nuevo
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text text-uppercase">Nuevo <span class="text-black fw-bold">Estudiante</span></h1>
        </li>
    </ul>
@endsection
@section('body')
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('estudiantes.index') }}">
                <i class="fas fa-angle-left"></i>
                ATRAS
            </a>
        </div>
        <div class="col-12 col-md-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form id="form-new-perfil" action="{{ route('estudiantes.store') }}" method="POST" class="form-row">
                        @csrf
                        @method('POST')
                        @include('dashboard.estudiantes.framentos.form-perfil', $perfil)
                        @include('dashboard.estudiantes.framentos.form-cambio-clave', $perfil)
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="button" onclick="$('#form-new-perfil').submit();" id="btn-new-student"
                        class="btn btn-success text-white">
                        <i class="fas fa-save mr-2"></i>
                        GUARDAR
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
