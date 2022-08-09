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
            <li class="nav-item ">
                <a class="nav-link" href="#">Matriculas</a>
            </li>
            <li
                class="nav-item {{ request()->routeIs('acceso_estudiantes') || request()->is('acceso_estudiantes/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('acceso_estudiantes') }}">Acceso Estudiantes</a>
            </li>
        </ul>
        <div>
            <a href="{{ route('login') }}" class="btn btn-outline-info">
                Iniciar Sesión
            </a>
        </div>
    </div>
</nav>
