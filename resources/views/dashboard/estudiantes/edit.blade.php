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
            <div class="col-12 col-md-12 mx-auto">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  active" id="home-tab" data-toggle="tab" data-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Perfil</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="profile-tab" data-toggle="tab" data-target="#profile" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">Información Parental</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link " id="contact-tab" data-toggle="tab" data-target="#contact" type="button"
                            role="tab" aria-controls="contact" aria-selected="false">Ficha de Registro</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('estudiantes.update', ['perfil' => $perfil]) }}" method="POST"
                            class="form-row" id="form-edit-student">
                            @csrf
                            @method('PUT')
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
                                    <option {{ $perfil->barrio_per == 'OPC 1' ? 'selected' : '' }} value="OPC 1">OPC 1
                                    </option>
                                    <option {{ $perfil->barrio_per == 'OPC 2' ? 'selected' : '' }} value="OPC 2">OPC 2
                                    </option>
                                    <option {{ $perfil->barrio_per == 'OPC 3' ? 'selected' : '' }} value="OPC 3">OPC 3
                                    </option>
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
                                <button type="button" id="btn-edit-student" class="btn btn-info text-white">
                                    <i class="fas fa-save mr-2"></i>
                                    ACTUALIZAR
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="" class="form-row">
                                    <div class="col-12 mb-4">
                                        <div class="d-flex justify-content-around align-items-center">
                                            <div>
                                                <h3>INFORMACIÓN DEL PADRE</h3>
                                            </div>
                                            <div>
                                                <label class="switch">
                                                    <input checked type="checkbox" name="estado_inf"
                                                        id="estado_inf_padre" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>APELLIDOS</b></label>
                                        <input type="text" class="form-control" value="{{ $padre->apellido_inf }}">
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>NOMBRES</b></label>
                                        <input type="text" class="form-control" value="{{ $padre->nombre_inf }}">
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b># CELULAR</b></label>
                                        <input type="text" class="form-control" value="{{ $padre->celular_inf }}">
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>BAUTIZO</b></label>

                                        <div class="d-flex justify-content-around align-items-center">
                                            <label>
                                                SI
                                                <input {{ $padre->bautizo_inf == 1 ? 'checked' : '' }} type="radio"
                                                    name="bautizo_inf" id="" value="1">
                                            </label>
                                            <label>
                                                NO
                                                <input {{ $padre->bautizo_inf == 0 ? 'checked' : '' }} type="radio"
                                                    name="bautizo_inf" id="" value="0">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>COMUNIÓN</b></label>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <label>
                                                SI
                                                <input {{ $padre->comunion_inf == 1 ? 'checked' : '' }} type="radio"
                                                    name="comunion_inf" id="">
                                            </label>
                                            <label>
                                                NO
                                                <input {{ $padre->comunion_inf == 0 ? 'checked' : '' }} type="radio"
                                                    name="comunion_inf" id="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>CONFIRMACIÓN</b></label>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <label>
                                                SI
                                                <input {{ $padre->confirmacion_inf == 1 ? 'checked' : '' }} type="radio"
                                                    name="confirmacion_inf" id="">
                                            </label>
                                            <label>
                                                NO
                                                <input {{ $padre->confirmacion_inf == 0 ? 'checked' : '' }} type="radio"
                                                    name="confirmacion_inf" id="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>MATRIMONIO</b></label>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <label>
                                                SI
                                                <input {{ $padre->matrimonio_inf == 1 ? 'checked' : '' }} type="radio"
                                                    name="matrimonio_inf" id="si_matrimonio_inf_padre">
                                            </label>
                                            <label>
                                                NO
                                                <input {{ $padre->matrimonio_inf == 0 ? 'checked' : '' }} type="radio"
                                                    name="matrimonio_inf" id="no_matrimonio_inf_padre">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="select-padre-estado_civil_inf form-padre col-12 col-md-6 mb-4">
                                        <label for=""><b>ESTADO CIVIL</b></label>
                                        <select name="estado_civil_inf" id="" class="form-control">
                                            <option value="SOLTERO">SOLTERO</option>
                                            <option value="UNION_LIBRE">UNION LIBRE</option>
                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                            <option value="VIUDO">VIUDO</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            {{--  --}}
                            <div class="col-12 col-md-6">

                                <form action="" class="form-row">
                                    <div class="col-12 mb-4">
                                        <div class="d-flex justify-content-around align-items-center">
                                            <div>
                                                <h3>INFORMACIÓN DE LA MADRE</h3>
                                            </div>
                                            <div>
                                                <label class="switch">
                                                    <input type="checkbox" name="estado_inf" id="estado_inf_madre"
                                                        value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="form-madre col-12 col-md-6 mb-4">
                                        <label for=""><b>APELLIDOS</b></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-madre col-12 col-md-6 mb-4">
                                        <label for=""><b>NOMBRES</b></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 text-center mb-4">
                                <hr>
                                <button type="button" class="btn btn-dark">
                                    <i class="fas fa-save mr-2"></i>
                                    GUARDAR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h1>INFO FICHA</h1>
                    </div>
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

        $("#si_matrimonio_inf_padre").change(() => {
            toggle_matrimonio("padre");
        });
        $("#no_matrimonio_inf_padre").change(() => {
            toggle_matrimonio("padre");
        });

        function form_parental(tipo) {
            const estado = $(`#estado_inf_${tipo}`).prop("checked");
            if (estado) {
                $(`.form-${tipo}`).fadeIn();
            } else {
                $(`.form-${tipo}`).hide();
            }

            toggle_matrimonio(tipo);

        }

        form_parental("padre");

        $("#estado_inf_padre").change(() => {
            form_parental("padre");
        });

        form_parental("madre");
        $("#estado_inf_madre").change(() => {
            form_parental("madre");
        });
        //
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
