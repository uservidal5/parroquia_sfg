@extends('template.dashboard')


@section('page_title')
    Dashboard | Inicio
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Bienvenido, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
        </li>
    </ul>
@endsection

@section('body')
    <div class="row">
        <div class="col-12"></div>
    </div>
@endsection
