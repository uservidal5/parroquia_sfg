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
                                            Guallabamba</span></h4>
                                </div>
                                <div class="col-12">
                                    <span class="fw-semi-bold text-muted">
                                        Hola! Vamos a empezar
                                    </span>
                                </div>
                                <div class="col-12 mb-4">
                                    <span class="fw-light text-info">
                                        <a href="{{ route('dashboard') }}" class="text-info">Inicia sesión para
                                            continuar.</a>
                                    </span>
                                </div>
                            </div>
                            <form action="" class="form-row">
                                <div class="col-12 mb-4">
                                    <input type="email" name="" id="" class="form-control form-control-lg"
                                        placeholder="Correo">
                                </div>
                                <div class="col-12 mb-4">
                                    <input type="password" name="" id=""
                                        class="form-control form-control-lg" placeholder="Contraseña">
                                </div>
                                <div class="col-12 mb-4 px-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label text-muted" for="defaultCheck1">
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mb-4 text-right">
                                    <a href="" class="btn btn-link text-info">
                                        ¿Olvidó su contraseña?
                                    </a>
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
