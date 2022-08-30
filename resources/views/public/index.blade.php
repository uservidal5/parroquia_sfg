@extends('template.base_simple')
@section('page_title')
    Inicio | Parroquia San Francisco de Guallabamba
@endsection

@section('body')
    @include('public.fragmentos.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="w-100" src="{{ asset('img/ninios.jpg') }}" alt="">
            </div>
        </div>
    </div>
@endsection
