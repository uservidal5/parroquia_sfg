@extends('template.dashboard')


@section('page_title')
    Estudiantes | Nuevo
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text text-uppercase">Nuevo <span class="text-black fw-bold">Estudiante</span></h1>
        </li>
    </ul>
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 mx-auto">
                <form action="{{ route('estudiantes.store') }}" method="POST" class="form-row needs-validation" novalidate
                    id="form-new-student" novalidate>
                    @csrf
                    @method('POST')
                    <div class="col-12 mb-4">
                        <a href="{{ route('estudiantes.index') }}">
                            <i class="fas fa-angle-left"></i>
                            ATRAS
                        </a>
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>CÉDULA</b></label>
                        <input type="text" name="cedula_per" id="cedula_per" minlength="10" maxlength="10"
                            class="form-control" required>
                        <div class="valid-feedback">
                            Es una cédula autentica.
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>APELLIDOS</b></label>
                        <input type="text" name="apellido_per" id="apellido_per" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>NOMBRES</b></label>
                        <input type="text" name="nombre_per" id="nombre_per" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>FECHA NACIMIENTO</b></label>
                        <input type="date" name="f_nacimiento_per" id="f_nacimiento_per" class="form-control" required>
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
                        <div class="invalid-feedback">
                            Este campo es requerido.
                        </div>

                    </div>
                    <div class="col-12 text-right mb-4">
                        <button type="submit" id="btn-new-student" class="btn btn-success text-white">
                            <i class="fas fa-save mr-2"></i>
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
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                            lanzar_toast("error", "Información invalida!");
                            // console.log(form.checkValidity());
                            resultado_validacion("#correo_per", false, "Invalido!");
                        } else {
                            Swal.fire({
                                title: 'Listo!',
                                text: 'Estudiante registrado con éxito.',
                                icon: 'success',
                                showConfirmButton: false,
                            });
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        function lanzar_toast(icon, text) {
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

        function resultado_validacion(id_input, result, message) {
            $(".input-validation").remove();
            $(`${id_input}`).addClass(`is-${result ? 'valid' : 'invalid'}`);
            $(`${id_input}`).parent().append(`
            <div class="input-validation ${result ? 'valid' : 'invalid'}-feedback">
                ${message}
            </div>`);
        }

        //
        $(() => {

        })


        // Swal.fire('Any fool can use a computer')
        // $("#form-new-student").submit((e) => {
        //     e.preventDefault();
        //     // VALIDACION
        //     // $("#form-new-student").addClass('was-validated');
        //     resultado_validacion("#correo_per", false, "Válido!");

        //     if (false) {
        //         Swal.fire({
        //             title: 'Listo!',
        //             text: 'Estudiante registrado con éxito.',
        //             icon: 'success',
        //             showConfirmButton: false,
        //         });
        //         setTimeout(() => {
        //             e.target.submit();
        //         }, 2000);
        //     } else {
        //         Swal.fire({
        //             title: 'Oops!',
        //             text: 'Por favor corrige la informacion ingresada.',
        //             icon: 'error',
        //             confirmButtonText: "Cerrar",
        //             // timer: 2000,
        //             // showConfirmButton: false,
        //         });
        //     }
        // });
        $(() => {});
    </script>
@endsection
