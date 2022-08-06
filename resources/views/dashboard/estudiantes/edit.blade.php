@extends('template.dashboard')


@section('page_title')
    Estudiantes | Actualizar
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h1>Actualizar Estudiante</h1>
            </div>
            <div class="col-12 col-md-6 mx-auto">
                <form action="{{ route('estudiantes.update', ['perfil' => $perfil]) }}" method="POST" class="form-row"
                    id="form-edit-student">
                    @csrf
                    @method('PUT')
                    <div class="col-12 mb-4">
                        <a href="{{ route('estudiantes.index') }}">
                            <i class="fas fa-angle-left"></i>
                            ATRAS
                        </a>
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>CÉDULA</b></label>
                        <input type="text" name="cedula_per" id="cedula_per" maxlength="10" class="form-control"
                            value="{{ $perfil->cedula_per }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>APELLIDOS</b></label>
                        <input type="text" name="apellido_per" id="apellido_per" class="form-control"
                            value="{{ $perfil->apellido_per }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>NOMBRES</b></label>
                        <input type="text" name="nombre_per" id="nombre_per" class="form-control"
                            value="{{ $perfil->nombre_per }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>FECHA NACIMIENTO</b></label>
                        <input type="date" name="f_nacimiento_per" id="f_nacimiento_per" class="form-control"
                            value="{{ $perfil->f_nacimiento_per }}">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>BARRIO</b></label>
                        <select name="barrio_per" id="barrio_per" class="form-control">
                            <option {{ $perfil->barrio_per == 'OPC 1' ? 'selected' : '' }} value="OPC 1">OPC 1</option>
                            <option {{ $perfil->barrio_per == 'OPC 2' ? 'selected' : '' }} value="OPC 2">OPC 2</option>
                            <option {{ $perfil->barrio_per == 'OPC 3' ? 'selected' : '' }} value="OPC 3">OPC 3</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>DIRECCIÓN</b></label>
                        <input type="text" name="direccion_per" id="direccion_per" class="form-control"
                            value="{{ $perfil->direccion_per }}">
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>CORREO</b></label>
                        <input type="email" name="correo_per" id="correo_per" class="form-control"
                            value="{{ $perfil->correo_per }}">
                    </div>
                    <div class="col-12 text-right mb-4">
                        <button type="button" id="btn-edit-student" class="btn btn-info">
                            <i class="fas fa-save"></i>
                            ACTUALIZAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#btn-edit-student").click((e) => {
            // VALIDACION
            Swal.fire({
                title: 'Listo!',
                text: 'Estudiante actualizado con éxito.',
                icon: 'success',
                showConfirmButton: false,
            });
            setTimeout(() => {
                $("#form-edit-student").submit();
            }, 2000);

        });
    </script>
@endsection
