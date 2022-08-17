<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->routeIs('dashboard') }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="menu-icon fas fa-home"></i>
                <span class="menu-title">
                    Inicio
                </span>
            </a>
        </li>
        {{-- NOMBRE CATEGORIA --}}
        <li class="nav-item nav-category">ADMINISTRACIÓN</li>
        {{-- MULTIPLE --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li> --}}
        {{-- SIMPLE --}}
        <li
            class="nav-item {{ request()->routeIs('estudiantes.index') || request()->is('estudiantes/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('estudiantes.index') }}">
                <i class="menu-icon fas fa-user"></i>
                <span class="menu-title">Estudiantes</span>
            </a>
        </li>
        <li
            class="nav-item {{ request()->routeIs('cursos.index') || request()->is('cursos/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cursos.index') }}">
                <i class="menu-icon fas fa-book"></i>
                <span class="menu-title">Cursos</span>
            </a>
        </li>

    </ul>
</nav>
