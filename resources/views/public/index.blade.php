@extends('template.base_simple')
@section('page_title')
    Inicio | Parroquia San Francisco de Guallabamba
@endsection

@section('body')
    @include('public.fragmentos.navbar')

    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('img/ninios.jpg') }}" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>¿Ya te matriculaste?</h5>
                <p>Ingresa tus datos e incribete, realiza el pago en secretarria</p>
                <a class="btn  btn btn-info" href="{{ route('acceso_estudiantes', ['type' => 'login']) }}">MATRICULARME</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/ninios.jpg') }}" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>¿Ya te matriculaste?</h5>
                <p>Ingresa tus datos e incribete, realiza el pago en secretarria</p>
                <a class="btn  btn btn-info" href="{{ route('acceso_estudiantes', ['type' => 'login']) }}">MATRICULARME</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/ninios.jpg') }}" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>¿Ya te matriculaste?</h5>
                <p>Ingresa tus datos e incribete, realiza el pago en secretarria</p>
                <a class="btn  btn btn-info" href="{{ route('acceso_estudiantes', ['type' => 'login']) }}">MATRICULARME</a>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
    </div>
       
        
        {{-- <div class="container">
            
            
        </div> --}}
        
        
    </div>
@endsection
