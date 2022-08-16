@extends('template.dashboard')
@section('css')
    <style>
        .nav-link {
            color: gray;
            font-size: .95rem;
        }

        .nav-link.active {
            font-weight: bold;
            color: black;
        }
    </style>
@endsection

@section('page_title')
    Estudiantes | Actualizar
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text text-uppercase">Actualizar <span class="text-black fw-bold">Estudiante</span></h1>
        </li>
    </ul>
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <a href="{{ route('estudiantes.index') }}">
                    <i class="fas fa-angle-left"></i>
                    ATRAS
                </a>
            </div>
        </div>
        {{-- TABS --}}
        <div class="row mb-2">
            <div class="col-12 col-md-4 text-center">
                <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'perfil']) }}"
                    class="btn btn-block {{ $tab == 'perfil' ? 'btn-primary' : 'btn-outline-primary' }}">Perfil</a>
            </div>
            <div class="col-12 col-md-4 text-center">
                <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'parental']) }}"
                    class="btn btn-block {{ $tab == 'parental' ? 'btn-primary' : 'btn-outline-primary' }}">Información
                    Parental</a>
            </div>
            <div class="col-12 col-md-4 text-center">
                <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'ficha']) }}"
                    class="btn btn-block {{ $tab == 'ficha' ? 'btn-primary' : 'btn-outline-primary' }}">Ficha de
                    Registro</a>
            </div>
        </div>

        <div class="row">
            @if ($tab == 'perfil')
                <div class="col-12">
                    @include('dashboard.estudiantes.framentos.form-perfil', $perfil)
                </div>
            @elseif($tab == 'parental')
                <div class="col-12 col-md-6 mb-4">
                    @include('dashboard.estudiantes.framentos.form-padre', $padre)
                </div>
                <div class="col-12 col-md-6 mb-4">
                    @include('dashboard.estudiantes.framentos.form-madre', $madre)
                </div>
                <div class="col-12 text-center">
                    <button type="button"
                        onclick="$('#form-padre').submit();
                    $('#form-madre').submit();"
                        class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i>
                        GUARDAR
                    </button>
                </div>
            @elseif($tab == 'ficha')
                <div class="col-12">
                    @include('dashboard.estudiantes.framentos.form-ficha', $ficha)
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script>
        const toggle_matrimonio = (tipo) => {
            const estado = $(`#si_matrimonio_inf_${tipo}`).prop("checked");
            if (estado) {
                $(`.select-${tipo}-estado_civil_inf`).hide();
            } else {
                $(`.select-${tipo}-estado_civil_inf`).show();
            }
        }

        function form_parental(tipo) {
            const estado = $(`#estado_inf_${tipo}`).prop("checked");
            if (estado) {
                $(`.form-${tipo}`).fadeIn();
            } else {
                $(`.form-${tipo}`).hide();
            }

            toggle_matrimonio(tipo);

        }
        //
        $(() => {
            form_parental("padre");
            form_parental("madre");
        })
        // form_ficha("ficha");

        @if (session('status') == 'ok')
            Swal.fire({
                title: 'Listo!',
                text: '{{ session('message') }}',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        @if ($errors->any())
            lanzar_toast("error", "Datos incorrectos!");
        @endif
        //
    </script>
@endsection
