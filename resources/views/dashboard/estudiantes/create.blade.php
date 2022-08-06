@extends('template.dashboard')


@section('page_title')
    Estudiantes | Nuevo
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h1>Nuevo Estudiante</h1>
            </div>
            <div class="col-12 col-md-6 mx-auto">
                <form action="{{ route('estudiantes.store') }}" method="POST" class="form-row" id="form-new-student">
                    @csrf
                    @method('POST')
                    <div class="col-12 mb-4">
                        <a href="">
                            <i class="fas fa-angle-left"></i>
                            ATRAS
                        </a>
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>CÉDULA</b></label>
                        <input type="text" name="cedula_per" id="cedula_per" maxlength="10" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>APELLIDOS</b></label>
                        <input type="text" name="apellido_per" id="apellido_per" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>NOMBRES</b></label>
                        <input type="text" name="nombre_per" id="nombre_per" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>FECHA NACIMIENTO</b></label>
                        <input type="date" name="f_nacimiento_per" id="f_nacimiento_per" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>BARRIO</b></label>
                        <select name="barrio_per" id="barrio_per" class="form-control">
                            <option value="OPC 1">OPC 1</option>
                            <option value="OPC 2">OPC 2</option>
                            <option value="OPC 3">OPC 3</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>DIRECCIÓN</b></label>
                        <input type="text" name="direccion_per" id="direccion_per" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>CORREO</b></label>
                        <input type="email" name="correo_per" id="correo_per" class="form-control">
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>CONTRASEÑA</b></label>
                        <input type="password" name="contrasenia_per" id="contrasenia_per" class="form-control">
                    </div>

                    <div class="col-12 text-right mb-4">
                        <button type="button" id="btn-new-student" class="btn btn-success">
                            <i class="fas fa-save"></i>
                            GUARDAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // Swal.fire('Any fool can use a computer')
        $("#btn-new-student").click((e) => {
            // VALIDACION
            Swal.fire({
                title: 'Listo!',
                text: 'Estudiante registrado con éxito.',
                icon: 'success',
                showConfirmButton: false,
            });
            setTimeout(() => {
                $("#form-new-student").submit();
            }, 2000);
        });
        $(() => {});
    </script>
@endsection
