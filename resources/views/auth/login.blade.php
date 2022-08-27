@extends('template.base_simple')

@section('page_title')
    Login | Parroquia San Francisco de Guallabamba
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <a href="{{ route('home') }}" class="btn btn-link text-muted">
                                        <i class="fas fa-angle-left mr-2"></i>
                                        Regresar
                                    </a>
                                </div>
                                <div class="col-12 mb-4">
                                    <h4 class="text-muted">Parroquia <span class="text-info">San Francisco de
                                            Guayllabamba</span></h4>
                                </div>
                                <div class="col-12">
                                    <span class="fw-semi-bold text-muted">
                                        Hola! Vamos a empezar
                                    </span>
                                </div>
                                <div class="col-12 mb-4">
                                    <span class="fw-light text-info">
                                        Inicia sesión para continuar.
                                    </span>
                                </div>
                            </div>
                            <form action="{{ route('login') }}" method="POST" class="form-row">
                                @csrf
                                <div class="col-12 mb-4">
                                    <input type="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="Correo" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-4">
                                    <input type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="Contraseña" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb-4 px-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text-muted" for="remember">
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mb-4 text-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-info" href="{{ route('password.request') }}">
                                            ¿Olvidó su contraseña?
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-dark">
                                        Ingresar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
