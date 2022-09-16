@extends('template.base_simple')
@section('page_title')
    Acceso Estudiantes | Parroquia San Francisco de Guallabamba
@endsection
@section('css')
    <style>
        .underline {
            text-decoration: underline;
        }
    </style>
@endsection
@section('body')
    @include('public.fragmentos.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Acceso para catequizandos</h1>
                        <p class="lead">Te presentamos el sistema web para la matriculación de catequesis.</p>
                        <hr class="my-4">
                        <p>Ingresa tu información completa e incribete en tu nivel y realiza el pago el secretaría para 
                            que puedan entregar un documento con el sello de la parroquia que certifique tu inscripción.</p>
                        {{-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <div class="d-none d-md-block">
                    <br>
                </div>
                <h2>Ingresa a nuestra plataforma</h2>
                <p>
                    Si ya creaste tu cuenta, puedes <a href="{{ route('acceso_estudiantes', ['type' => 'login']) }}"
                        class="btn-form {{ $type == 'login' ? 'underline' : '' }}"><i>iniciar sésion</i></a>, o si aun
                    no tienes tu
                    cuenta puedes crearlas desde <a href="{{ route('acceso_estudiantes', ['type' => 'signup']) }}"
                        class="btn-form {{ $type == 'signup' ? 'underline' : '' }}"><span>aqui</span></a>.
                </p>
            </div>
            <div class="col-12 col-md-6 mb-4">
                @if ($type == 'login')
                    {{-- LOGIN --}}
                    <form id="form-login" action="{{ route('public_estudiante.login') }}" class="form-estudiantes form-row"
                        method="POST">
                        @csrf
                        <div class="col-12 mb-4">
                            <div class="form-group">
                                <label>Cédula de Identidad</label>
                                <input type="text" class="form-control @error('cedula_per') is-invalid @enderror"
                                    name="cedula_per" value="{{ old('cedula_per') }}">
                                @error('cedula_per')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control @error('contrasenia_per') is-invalid @enderror"
                                    name="contrasenia_per">
                                @error('contrasenia_per')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            <a class="btn btn-link"
                                href="{{ route('acceso_estudiantes', ['type' => 'forgot-password']) }}">¿Olvidaste tu
                                contraseña?</a>
                        </div>
                    </form>
                @elseif($type == 'signup')
                    {{-- SIGNUP --}}
                    <form id="form-signup" action="{{ route('public_estudiante.store') }}" method="POST"
                        class="form-estudiantes form-row">
                        @csrf
                        @include('public.fragmentos._estudiante._form_perfil_simple', $perfil)
                        @include('public.fragmentos._estudiante._form_clave', $perfil)
                    </form>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" onclick="$('#form-signup').submit();"
                                class="btn btn-success">Registrar</button>
                        </div>
                    </div>
                @else
                    {{-- Olvidó contraseña --}}
                    <form id="form-forgot-password" action="{{ route('public_estudiante.restore_password') }}"
                        method="POST" class="form-estudiantes form-row">
                        @csrf
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Cédula de Identidad</label>
                                <input type="text" class="form-control @error('cedula_per') is-invalid @enderror"
                                    name="cedula_per" value="{{ old('cedula_per') }}">
                                @error('cedula_per')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" class="form-control @error('f_nacimiento_per') is-invalid @enderror"
                                    name="f_nacimiento_per" value="{{ old('f_nacimiento_per') }}">
                                @error('f_nacimiento_per')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (session('new_password'))
                            <div class="col-12">
                                <p class="text-center">
                                    Tu nueva contraseña temporal es:
                                    <b class="d-block my-4 h3">{{ session('new_password') }}</b>
                                    Ingresa al sistema y actualizala lo más pronto posible.
                                </p>
                            </div>
                        @endif
                    </form>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" onclick="$('#form-forgot-password').submit();" class="btn btn-info">
                                <i class="fas fa-key mr-2"></i>
                                Recuperar Contraseña
                            </button>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
