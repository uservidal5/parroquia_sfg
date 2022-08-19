<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('page_title')</title>

    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    {{--  --}}
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/css/vertical-layout-light/style.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/feather/feather.css">
    {{-- STYLES --}}
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/css/vertical-layout-light/_buttons.css">
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/simple-line-icons/css/simple-line-icons.css">
    {{-- <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/css/vendor.bundle.base.css"> --}}
    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('libs/dashboard') }}/js/select.dataTables.min.css"> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->


    <!-- endinject -->
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .logo-css {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #1F3BB3;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 100%;
        }

        .ico-xs-dropdown {
            font-size: 18px !important;
        }


        /* .swal2-icon {
            margin: 2.5em auto 0.6em !important;
        }

        .swal2-toast>.swal2-icon {
            margin: none !important;
        } */
        .swal2-modal {
            padding-top: 42px !important;
        }

        .btn-plain,
        .btn-plain:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        /* RADIO BUTTON */
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    @yield('css')
    <script>
        const mostrar_menu = () => {
            const navbar = document.getElementById("sidebar");
            navbar.classList.toggle("active");
        }
    </script>
</head>

<body>
    <div id="proBanner">
        <div id="bannerClose"></div>
    </div>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row"
            style="margin-top: 0!important; padding-top: 0!important;">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
                        <span>PARROQUIA <br><b>SFG</b></span>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
                        <span class="logo-css d-md-none">{{ Auth::user()->name[0] }}</span>
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                {{-- SALUDO --}}
                @yield('name_section')
                {{-- FIN SALUDO --}}
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> --}}
                            <span class="logo-css">{{ Auth::user()->name[0] }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                {{-- <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> --}}
                                <span>PARROQUIA <b>SFG</b></span>
                                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                                <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('user.profile') }}" class="dropdown-item">
                                <i class="fas fa-user me-2 ico-xs-dropdown" style=""></i>
                                Mi perfil
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); cerrar_sesion();">
                                <i class="fas fa-power-off me-2 ico-xs-dropdown"></i>
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>
                </ul>
                {{--  --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                {{--  --}}
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    onclick="mostrar_menu();">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="padding-left: 0;">
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('template._dashboard.menu')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('body')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        Copyright © {{ date('Y') }}.
                        All rights reserved.
                    </span>
                </footer>
            </div>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->
    @yield('modals')

    <!-- plugins:js -->
    <script src="{{ asset('libs/dashboard') }}/vendors/js/vendor.bundle.base.js"></script>

    <script src="{{ asset('libs/dashboard') }}/js/template.js"></script>

    <script src="{{ asset('libs/dashboard') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    {{-- DataTable --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    {{-- Sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--  --}}
    <script>
        const cerrar_sesion = () => {

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
        const lanzar_toast = (icon, text) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: text,
            })
        }


        $('.modal').on('show.bs.modal', function(event) {
            $('html').css('overflow', 'hidden');
        }).on('hide.bs.modal', function(event) {
            $('html').css('overflow', 'auto');

        });
    </script>
    @yield('js')
    @stack('js_footer')
</body>

</html>
