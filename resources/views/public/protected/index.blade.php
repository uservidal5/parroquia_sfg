@extends('template.base_simple')
@section('page_title')
    Inicio | Parroquia San Francisco de Guallabamba
@endsection
@section('css')
    <style>
        .space-icon {
            width: 2rem;
        }
    </style>
@endsection
@section('body')
    @include('public.fragmentos.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-2 p-0">
                @include('public.fragmentos._layout._navegacion')
            </div>
            <div class="col-12 col-md-10 p-4">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($tab === '')
                            {{-- Saludo --}}
                            <div class="jumbotron">
                                <h1 class="display-4">
                                    Bienvenido {{ $perfil->nombre_per . ' ' . $perfil->apellido_per }}!
                                </h1>
                                <p class="lead">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis corporis itaque, optio
                                    reiciendis vitae, inventore ex illum velit nostrum unde voluptatum doloremque adipisci
                                    officiis facilis! Quod nostrum maxime facere natus!
                                </p>
                                <hr class="my-4">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, maiores.
                                </p>
                            </div>
                            {{-- Saludo --}}
                        @endif
                        @yield('card_body')
                    </div>
                </div>
            </div>
        </div>
        {{-- Navegacion --}}
        {{-- Body --}}
    </div>
    <form id="logout-form" class="d-none" action="{{ route('inicio_estudiante.logout') }}" method="post">
        @csrf
    </form>
@endsection
@section('js')
    <script>
        function logout() {
            Swal.fire({
                title: 'Cerrar Sesión',
                text: '¿Deseas continuar?',
                icon: 'question',
                showConfirmButton: false,
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: 'Si, deseo salir',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    //
                    const form_logout = document.getElementById("logout-form");
                    form_logout.submit();
                }
            })
        }
    </script>
    @include('dashboard.fragemtos.form-status')
@endsection
