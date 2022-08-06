@extends('template.dashboard')


@section('page_title')
    Estudiantes | Inicio
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1>HOLA MUNDO!</h1>
            </div>
            <div class="col-12 text-right mb-4">
                <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">
                    NUEVO
                    <i class="fas fa-plus ml-2"></i>
                </a>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover" id="tabla-estudiantes">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">CI</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">
                                    <i class="fas fa-cog"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <th scope="row">{{ $estudiante->id }}</th>
                                    <td>{{ $estudiante->cedula_per }}</td>
                                    <td>{{ $estudiante->apellido_per }}</td>
                                    <td>{{ $estudiante->nombre_per }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-target="#modalEstudiante" data-toggle="modal"
                                                data-url="{{ route('estudiantes.show', ['perfil' => $estudiante]) }}"
                                                type="button" class="btn">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('estudiantes.edit', ['perfil' => $estudiante]) }}"
                                                class="btn">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form class="d-inline-block" method="POST"
                                                id="form-delete-{{ $estudiante->id }}"
                                                action="{{ route('estudiantes.delete', ['perfil' => $estudiante]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="borrarEstudiante({{ $estudiante->id }});"
                                                    class="btn">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div class="modal fade" id="modalEstudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">INFORMACIÓN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="info-estudiante" class="row" style="display: none;">
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>CÉDULA</b></label>
                            <p id="cedula_per"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>CORREO</b></label>
                            <p id="correo_per"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>APELLIDOS</b></label>
                            <p id="apellido_per"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>NOMBRES</b></label>
                            <p id="nombre_per"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>FECHA NACIMIENTO</b></label>
                            <p id="f_nacimiento_per"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>EDAD</b></label>
                            <p id="edad"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>BARRIO</b></label>
                            <p id="barrio_per"></p>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <label for=""><b>DIRECCIÓN</b></label>
                            <p id="direccion_per"></p>
                        </div>

                    </div>
                    <div id="modal-loading" class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-spin fa-spinner"></i>
                            CONSULTANDO DATOS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function borrarEstudiante(id) {
            Swal.fire({
                title: 'Espera!',
                text: '¿Deseas eliminar este registro?',
                icon: 'question',
                showConfirmButton: false,
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: 'Si, deseo eliminar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    Swal.fire('Listo', 'Registro eliminado con éxito!', 'success');
                    setTimeout(() => {
                        $(`#form-delete-${id}`).submit();
                    }, 2000);
                }
            })
        }

        function calcularEdad(fecha) {
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }

            return edad;
        }

        $('#modalEstudiante').on('show.bs.modal', async function(event) {
            var button = $(event.relatedTarget);
            var url = button.data('url');
            await fetch(url).then(response => response.json()).then(data => {
                return {
                    cedula_per,
                    apellido_per,
                    nombre_per,
                    f_nacimiento_per,
                    barrio_per,
                    direccion_per,
                    correo_per,
                    contrasenia_per,
                    estado_per
                } = data
            });
            var modal = $(this);
            modal.find('#cedula_per').text(`${cedula_per ? cedula_per : ''}`);
            modal.find('#apellido_per').text(`${apellido_per ? apellido_per:''}`);
            modal.find('#nombre_per').text(`${nombre_per ? nombre_per : ''}`);
            modal.find('#f_nacimiento_per').text(`${f_nacimiento_per ? f_nacimiento_per : ''}`);
            modal.find('#barrio_per').text(`${barrio_per ? barrio_per : ''}`);
            modal.find('#direccion_per').text(`${direccion_per ? direccion_per : ''}`);
            modal.find('#edad').text(`${f_nacimiento_per ? calcularEdad(f_nacimiento_per) + " AÑOS" : ''}`);
            modal.find('#correo_per').text(`${correo_per ? correo_per : ''}`);
            //
            $("#modal-loading").hide();
            $("#info-estudiante").fadeIn();
        });
        $('#modalEstudiante').on('hidden.bs.modal', function(event) {
            $('#cedula_per').text("");
            $('#apellido_per').text("");
            $('#nombre_per').text("");
            $('#f_nacimiento_per').text("");
            $('#barrio_per').text("");
            $('#direccion_per').text("");
            $('#edad').text("");
            $('#correo_per').text("");

            $("#modal-loading").show();
            $("#info-estudiante").hide();
        });
        $(() => {
            $("#tabla-estudiantes").DataTable();
        });
    </script>
@endsection
