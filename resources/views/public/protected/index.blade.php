@extends('template.base_simple')
@section('page_title')
    Inicio | Parroquia San Francisco de Guallabamba
@endsection

@section('body')
    @include('public.fragmentos.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Bienvenido {{ $perfil->nombre_per . ' ' . $perfil->apellido_per }}!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                            attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <button onclick="logout()" type="button" class="btn btn-danger btn-lg">
                            Salir
                        </button>

                    </div>
                </div>
            </div>
        </div>
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
@endsection
