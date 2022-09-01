<div class="border list-group-item-dark" style="position: sticky; top: 10px;">
    {{-- Header --}}
    <div class="d-flex justify-content-around align-items-center my-2">
        <a class="text-dark" href="{{ route('inicio_estudiante.index', ['tab' => '']) }}">
            <i class="fa-solid fa-place-of-worship fa-2x"></i>
        </a>
        {{--  --}}
        <h3 class="text-center">
            <span class="d-block font-weight-light">Parroquia</span>
            SFG
        </h3>
    </div>
    {{-- BodyNav --}}
    <div class="list-group list-group-flush">
        <a href="{{ route('inicio_estudiante.index', ['tab' => 'perfil']) }}"
            class="list-group-item list-group-item-action list-group-item-dark {{ $tab == 'perfil' || $tab == 'cambio_clave' ? 'active' : '' }}">
            <div class="d-flex align-items-center">
                <i class="fas fa-user mr-2 space-icon"></i>
                <span>Perfil</span>
            </div>
        </a>
        <a href="{{ route('inicio_estudiante.index', ['tab' => 'informacion_parental', 'parental' => 'padre']) }}"
            class="list-group-item list-group-item-action list-group-item-dark {{ $tab == 'informacion_parental' ? 'active' : '' }}">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-children mr-2 space-icon"></i>
                <span>Información Parental</span>
            </div>
        </a>
        <a href="{{ route('inicio_estudiante.index', ['tab' => 'matriculas']) }}"
            class="list-group-item list-group-item-action list-group-item-dark {{ $tab == 'matriculas' ? 'active' : '' }}">
            <div class="d-flex align-items-center">
                <i class="fas fa-book mr-2 space-icon"></i>
                <span>Matriculas</span>
            </div>
        </a>
        <button onclick="logout()" type="button" class="list-group-item list-group-item-action list-group-item-danger">
            <div class="d-flex align-items-center">
                <i class="fa-solid fa-right-from-bracket mr-2 space-icon"></i>
                <span>Cerrar Sesión</span>
            </div>
        </button>
    </div>
</div>
