<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">Parroquia <b>SFG</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="d-none nav-item ">
                <a class="nav-link" href="#">Matriculas</a>
            </li>
            <li
                class="d-none nav-item {{ request()->routeIs('acceso_estudiantes') ||
                request()->is('acceso_estudiantes/*') ||
                request()->routeIs('inicio_estudiante.index') ||
                request()->is('panel_estudiante/*')
                    ? 'active'
                    : '' }}">
                <a class="nav-link" href="{{ route('acceso_estudiantes', ['type' => 'login']) }}">Acceso Estudiantes</a>
            </li>
        </ul>
        <div>
            <!-- Authentication Links -->
            @if (!session('idPerfilLogin'))
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="btn btn-outline-info">
                            Iniciar Sesión
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a class="btn btn-link text-white" href="{{ route('register') }}">Registrate</a>
                    @endif
                @else
                    <a class="btn btn-link text-white" href="{{ route('dashboard') }}">Ir al dashboard</a>
                    {{-- <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div> --}}
                @endguest
            @endif

        </div>
    </div>
</nav>
