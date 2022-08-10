@extends('template.dashboard')


@section('page_title')
    Mi perfil | Inicio
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Gestiona tu <span class="text-black fw-bold">Perfil</span></h1>
        </li>
    </ul>
@endsection

@section('body')
    <div class="card mb-4">
        <div class="card-body card-text">
            <div class="row">
                <div class="col-12 col-md-3 border-right">
                    <h3 class="text-muted">Datos <span class="text-dark">Informativos</span></h3>
                </div>
                <div class="col-12 col-md-9">
                    <form action="{{ route('user.actualizar_datos_personales') }}" class="form-row" method="POST"
                        id="form-datos-personales">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-4">
                            <label for=""><b>{{ __('Full Name') }}</b></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') ?: Auth::user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 mb-4">
                            <label for=""><b>{{ __('Email Address') }}</b></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') ?: Auth::user()->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn-submit btn btn-dark">Actualizar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="card-text">
                <div class="row">
                    <div class="col-12 col-md-3 border-right">
                        <h3 class="text-muted">Cambiar <span class="text-dark">Contraseña</span></h3>
                    </div>
                    <div class="col-12 col-md-9">
                        <form action="{{ route('user.cambiar_clave_acceso') }}" method="POST" class="form-row">
                            @csrf
                            @method('PUT') <div class="col-12 mb-4">
                                <label for=""><b>{{ __('Old password') }}</b></label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                    name="old_password">
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label for=""><b>{{ __('New password') }}</b></label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    name="new_password">
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 mb-4">
                                <label for=""><b>{{ __('Repet password') }}</b></label>
                                <input type="password" class="form-control @error('re_new_password') is-invalid @enderror"
                                    name="re_new_password">
                                @error('re_new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn-submit btn btn-dark">
                                    Cambiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4 bg-inverse-danger">
        <div class="card-body">
            <div class="card-text">
                <div class="row">
                    <div class="col-12 col-md-3 border-right">
                        <h3 class="text-dark">Elimina tu <span class="text-danger">Perfil</span></h3>
                    </div>
                    <div class="col-12 col-md-9">
                        <form action="" class="form-row">
                            <div class="col-12  mb-4">
                                <label for=""><b>{{ __('Password') }} de confirmación</b></label>
                                <input type="password" class="form-control" name="name" value="">
                            </div>
                            <div class="col-12 ">
                                <label class="">
                                    <input checked type="radio" name="tipo-baja" class="mr-2">
                                    Desactivar Perfil
                                </label>
                                <br>
                                <label class="">
                                    <input type="radio" name="tipo-baja" class="mr-2">
                                    <b class="text-danger">Eliminar Perfil</b>
                                </label>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-dark">Confirmar</button>
                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("form").submit((event) => {
            // event.preventDefault();
            const loading_text = `<i class="fas fa-spin fa-spinner mr-2"></i>Espere`;
            const form = event.target;
            $(form).find(".btn-submit").prop("disabled", true);
            $(form).find(".btn-submit").html(loading_text);
            // console.log("clik");
        });
        @if (session('status'))
            lanzar_toast("success", '{{ session('message') }}');
        @endif
    </script>
@endsection
