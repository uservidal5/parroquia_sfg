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
                <a href="{{ route('estudiantes.edit', ['perfil' => $perfil, 'tab' => 'matriculas']) }}"
                    class="btn btn-block {{ $tab == 'matriculas' ? 'btn-primary' : 'btn-outline-primary' }}">Matrículas</a>
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
                                    <input type="radio" name="estado_mat" value="En curso" class="d-none1">
                                    En curso
                                </label>
                                <label class="btn-estado finalizado btn">
                                    <input type="radio" name="estado_mat" value="Finalizado" class="d-none1">
                                    Finalizado
                                </label>
                                <label class="btn-estado retirado btn">
                                    <input type="radio" name="estado_mat" value="Retirado" class="d-none1">
                                    Retirado
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer p-1">
                    <button type="button" onclick="$('#form-editar-matricula').submit();" class="btn btn-inverse-primary">
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
                case "Finalizado":
                    $("#modalMatricula").find(".finalizado").addClass("btn-inverse-success");
                    estados.filter('[value="Finalizado"]').attr('checked', true);
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
