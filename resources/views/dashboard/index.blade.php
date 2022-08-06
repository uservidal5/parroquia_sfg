@extends('template.dashboard')


@section('page_title')
    Dashboard | Inicio
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1>Dashboard</h1>
            </div>
            <div class="col-12 mb-4">
                <a class="btn btn-outline-info" href="{{ route('estudiantes.index') }}">
                    <i class="fas fa-user mr-2"></i>
                    Estudiantes
                </a>
            </div>
        </div>
    </div>
@endsection
