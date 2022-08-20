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
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 mx-auto">
                <form action="{{ route('estudiantes.store') }}" method="POST" class="form-row">
                    @csrf
                    @method('POST')
                    <div class="col-12 mb-4">
                        <a href="{{ route('estudiantes.index') }}">
                            <i class="fas fa-angle-left"></i>
                            ATRAS
                        </a>
                    </div>
                    @include('dashboard.estudiantes.framentos.form-perfil', $perfil)
                    {{--  --}}
                    @include('dashboard.estudiantes.framentos.form-cambio-clave', $perfil)
                    {{--  --}}
                    <div class="col-12 text-right mb-4">
                        <button type="submit" id="btn-new-student" class="btn btn-success text-white">
                            <i class="fas fa-save mr-2"></i>
                            GUARDAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Swal.fire({
        // title: 'Listo!',
        // text: 'Estudiante registrado con éxito.',
        // icon: 'success',
        // showConfirmButton: false,
        // });
        // lanzar_toast("error", "Información invalida!");
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    </script>
@endsection
