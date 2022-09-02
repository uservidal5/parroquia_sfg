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
            <div class="col-12 col-md-12">
                <div class="d-flex flex-column flex-md-row">
                    <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'perfil']) }}"
                        class="btn flex-fill mx-2 {{ $tab == 'perfil' || $tab == 'cambio_clave' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Perfil
                    </a>
                    <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'parental_padre']) }}"
                        class="btn flex-fill mx-2 {{ $tab == 'parental_padre' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Información del Padre
                    </a>
                    <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'parental_madre']) }}"
                        class="btn flex-fill mx-2 {{ $tab == 'parental_madre' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Información de la Madre
                    </a>
                    <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'matriculas']) }}"
                        class="btn flex-fill mx-2 {{ $tab == 'matriculas' ? 'btn-primary' : 'btn-outline-primary' }}">
                        Matrículas
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($tab == 'perfil')
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title my-2">DATOS INFORMATIVOS</h3>
                        </div>
                        <div class="card-body">
                            <form id="form-perfil" action="{{ route('estudiantes.update', ['perfil' => $perfil]) }}"
                                method="POST" class="form-row">
                                @method('PUT')
                                {{-- PARA VALIDAR FUERA DE ESTE REGISTRO --}}
                                <input type="hidden" name="id" value="{{ $perfil->id }}">

                                {{-- PLANTILLA FORM PERFIL --}}
                                @include('dashboard.estudiantes.framentos.form-perfil', $perfil)
                            </form>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'cambio_clave']) }}">
                                <i class="fas fa-key mr-2"></i>
                                Cambio de contraseña
                            </a>
                            <button type="button" onclick="$('#form-perfil').submit();" class="btn btn-info text-white">
                                <i class="fas fa-save mr-2"></i>
                                ACTUALIZAR
                            </button>
                        </div>
                    </div>
                </div>
            @elseif($tab == 'cambio_clave')
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title my-2">CAMBIO DE CONTRASEÑA</h3>
                        </div>
                        <div class="card-body">
                            <form id="form-cambio-clave"
                                action="{{ route('estudiantes.cambio_clave', ['perfil' => $perfil]) }}" method="POST"
                                class="form-row">
                                @method('PUT')
                                {{-- PLANTILLA FORM PERFIL --}}
                                @include('dashboard.estudiantes.framentos.form-cambio-clave')
                            </form>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a class="btn btn-link" href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'perfil']) }}">
                                <i class="fas fa-angle-left mr-2"></i>
                                Volver al perfil
                            </a>
                            <button type="button" onclick="$('#form-cambio-clave').submit();"
                                class="btn btn-warning text-white">
                                <i class="fas fa-key mr-2"></i>
                                ACTUALIZAR
                            </button>
                        </div>
                    </div>
                </div>
            @elseif($tab == 'parental_padre')
                <div class="col-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('informacion_parental.update', ['informacion_parental' => $padre]) }}"
                                id="form-padre" class="form-row" method="POST">
                                @method('PUT')
                                {{--  --}}
                                @include('dashboard.estudiantes.framentos.form-parental', [
                                    'parental' => $padre,
                                    'type' => 'padre',
                                ])
                                {{--  --}}
                            </form>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" onclick="$('#form-padre').submit();" class="btn btn-inverse-primary">
                                <i class="fas fa-save mr-2"></i>
                                ACTUALIZAR
                            </button>
                        </div>
                    </div>
                </div>
            @elseif ($tab == 'parental_madre')
                <div class="col-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('informacion_parental.update', ['informacion_parental' => $madre]) }}"
                                id="form-madre" class="form-row" method="POST">
                                @method('PUT')
                                {{--  --}}
                                @include('dashboard.estudiantes.framentos.form-parental', [
                                    'parental' => $madre,
                                    'type' => 'madre',
                                ])
                                {{--  --}}
                            </form>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" onclick="$('#form-madre').submit();" class="btn btn-inverse-primary">
                                <i class="fas fa-save mr-2"></i>
                                ACTUALIZAR
                            </button>
                        </div>
                    </div>
                </div>
            @elseif ($tab == 'matriculas')
                <div class="col-12">
                    @include('dashboard.estudiantes.framentos.seccion_matriculas', [
                        'perfil_id' => $perfil->id,
                        'matriculado' => $matriculado,
                        'inscribibles' => $inscribibles,
                    ])
                </div>
            @endif
        </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="modalMatricula">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Información de Matricula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="form-row" method="POST" id="form-editar-matricula">
                        @csrf
                        @method('PUT')
                        <div class="col-12 mb-4">
                            <label for="">Estado del pago</label>
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="" class="mx-4">Sin pago</label>
                                <label class="switch">
                                    <input type="checkbox" name="pago_mat" id="" value="1">
                                    <span class="slider round"></span>
                                </label>
                                <label for="" class="mx-4">Pago</label>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <label for="">Estado del cursante</label>
                            <div class="btn-group">
                                <label class="btn-estado en_curso btn">
                                    <input type="radio" name="estado_mat" value="En curso" class="mr-2">
                                    En curso
                                </label>
                                <label class="btn-estado finalizado btn">
                                    <input type="radio" name="estado_mat" value="Aprobado" class="mr-2">
                                    Aprobado
                                </label>
                                <label class="btn-estado retirado btn">
                                    <input type="radio" name="estado_mat" value="Retirado" class="mr-2">
                                    Retirado
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-1">
                    <button type="button" onclick="$('#form-editar-matricula').submit();"
                        class="btn btn-inverse-primary">
                        <i class="fas fa-save mr-2"></i>
                        ACTUALIZAR
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const toggle_matrimonio = (tipo) => {
            const estado = $(`#si_matrimonio_inf_${tipo}`).prop("checked");
            if (estado) {
                $(`.select-${tipo}-estado_civil_inf`).hide();
                $(`.select-${tipo}-estado_civil_inf`).find("select>option:selected").removeAttr("selected");
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
                $(`.form-${tipo}`).find("input[type='text']").val("");
                $(`.form-${tipo}`).find("input[type='radio'][value='0']").prop("checked", true);
            }

            toggle_matrimonio(tipo);

        }
        // form_ficha("ficha");
        //
    </script>
    <script>
        $('input:radio[name=estado_mat]').change(() => {
            let value = $('input:radio[name=estado_mat]:checked').val();
            toggle_estado_matricula(value);
        });

        function toggle_estado_matricula(value) {
            const estados = $('input:radio[name=estado_mat]');
            $('#modalMatricula').find(".btn-estado").removeClass(
                "btn-inverse-secondary btn-inverse-info btn-inverse-success btn-inverse-danger");

            $('#modalMatricula').find(".btn-estado").addClass("btn-inverse-secondary");
            switch (value) {
                case "En curso":
                    $("#modalMatricula").find(".en_curso").addClass("btn-inverse-info");
                    estados.filter('[value="En curso"]').attr('checked', true);
                    break;
                case "Aprobado":
                    $("#modalMatricula").find(".finalizado").addClass("btn-inverse-success");
                    estados.filter('[value="Aprobado"]').attr('checked', true);
                    break;
                case "Retirado":
                    $("#modalMatricula").find(".retirado").addClass("btn-inverse-danger");
                    estados.filter('[value="Retirado"]').attr('checked', true);
                    break;
                default:
                    break;
            }

        }

        $('#modalMatricula').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('matricula') // Extract info from data-* attributes
            var pago = button.data('pago') // Extract info from data-* attributes
            var estado = button.data('estado') // Extract info from data-* attributes

            var modal = $(this)
            var form = modal.find("form");
            form.attr("action", `{{ route('matriculas.index') }}/${id}`);
            var inp_pago = modal.find("[name='pago_mat']");
            var estados = $('input:radio[name=estado_mat]');
            if (pago) {
                inp_pago.prop("checked", true);
            }
            toggle_estado_matricula(estado);


        })

        const newMatricula = (id) => {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Deseas matricularlo en este registro?',
                icon: 'question',
                showConfirmButton: true,
                confirmButtonText: 'Si, confirmar',
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                // showDenyButton: true,
                // denyButtonText: 'Si, confirmar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $(`#form-new-matricula-${id}`).submit();
                }
            })
        }
        const deleteMatricula = (id) => {
            Swal.fire({
                title: 'Espera!',
                text: '¿Deseas remover en este registro?',
                icon: 'question',
                showConfirmButton: false,
                // confirmButtonText: 'Si, deseo eliminar',
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: 'Si, confirmar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    $(`#form-delete-matricula-${id}`).submit();
                }
            })
        }
    </script>
    @include('dashboard.fragemtos.form-status')
@endsection
