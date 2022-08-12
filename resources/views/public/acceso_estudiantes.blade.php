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
                        <h1 class="display-4">Acceso para estudiantes</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                            attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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
                        </div>
                    </form>
                @else
                    {{-- SIGNUP --}}
                    <form id="form-signup" action="{{ route('public_estudiante.store') }}" method="POST"
                        class="form-estudiantes form-row">
                        @csrf
                        <form id="form-login" action="" class="form-estudiantes form-row">
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
                                    <input type="date"
                                        class="form-control @error('f_nacimiento_per') is-invalid @enderror"
                                        name="f_nacimiento_per" value="{{ old('f_nacimiento_per') }}">
                                    @error('f_nacimiento_per')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control @error('apellido_per') is-invalid @enderror"
                                        name="apellido_per" value="{{ old('apellido_per') }}">
                                    @error('apellido_per')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control @error('nombre_per') is-invalid @enderror"
                                        name="nombre_per" value="{{ old('nombre_per') }}">
                                    @error('nombre_per')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Correo Electrónico</label>
                                    <input type="email" class="form-control @error('correo_per') is-invalid @enderror"
                                        name="correo_per" value="{{ old('correo_per') }}">
                                    <small class="form-text text-muted">
                                        Nunca compartiremos su correo electrónico con nadie más.
                                    </small>
                                    @error('correo_per')
                                        <br>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password"
                                        class="form-control @error('contrasenia_per') is-invalid @enderror"
                                        name="contrasenia_per" value="{{ old('contrasenia_per') }}">
                                    @error('contrasenia_per')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Repetir Contraseña</label>
                                    <input type="password"
                                        class="form-control @error('re_contrasenia_per') is-invalid @enderror"
                                        name="re_contrasenia_per">
                                    @error('re_contrasenia_per')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-success">Registrar</button>
                            </div>
                        </form>
                    </form>
                @endif
            </div>

        </div>
    </div>
@endsection
