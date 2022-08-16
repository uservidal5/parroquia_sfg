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
                <form action="{{ route('estudiantes.store') }}" method="POST" class="form-row">
                    @csrf
                    @method('POST')
                    <div class="col-12 mb-4">
                        <a href="{{ route('estudiantes.index') }}">
                            <i class="fas fa-angle-left"></i>
                            ATRAS
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>CÉDULA</b></label>
                        <input type="text" name="cedula_per" id="cedula_per"
                            class="form-control @error('cedula_per') is-invalid @enderror" value="{{ old('cedula_per') }}">
                        @error('cedula_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>CORREO</b></label>
                        <input type="email" name="correo_per" id="correo_per" value="{{ old('correo_per') }}"
                            class="form-control @error('correo_per') is-invalid @enderror">
                        @error('correo_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>APELLIDOS</b></label>
                        <input type="text" name="apellido_per" id="apellido_per" value="{{ old('apellido_per') }}"
                            class="form-control @error('apellido_per') is-invalid @enderror">
                        @error('apellido_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>NOMBRES</b></label>
                        <input type="text" name="nombre_per" id="nombre_per" value="{{ old('nombre_per') }}"
                            class="form-control @error('nombre_per') is-invalid @enderror">
                        @error('nombre_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>FECHA NACIMIENTO</b></label>
                        <input type="date" name="f_nacimiento_per" id="f_nacimiento_per"
                            value="{{ old('f_nacimiento_per') }}"
                            class="form-control @error('f_nacimiento_per') is-invalid @enderror">
                        @error('f_nacimiento_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>BARRIO</b></label>
                        <select name="barrio_per" id="barrio_per"
                            class="form-control @error('barrio_per') is-invalid @enderror">
                            <option {{ old('barrio_per') === '' ? 'selected' : '' }} value="">VACÍO</option>
                            <option
                                {{ old('barrio_per') == 'Centro de Guayllabamba' ? 'selected' : '' }}value="Centro de Guayllabamba">
                                Centro de Guayllabamba</option>
                            <option {{ old('barrio_per') == 'Chaquibamba' ? 'selected' : '' }} value="Chaquibamba">
                                Chaquibamba</option>
                            <option {{ old('barrio_per') == 'Los Duques' ? 'selected' : '' }} value="Los Duques">Los Duques
                            </option>
                            <option {{ old('barrio_per') == 'San Pedro' ? 'selected' : '' }} value="San Pedro">San Pedro
                            </option>
                            <option {{ old('barrio_per') == 'San Juan' ? 'selected' : '' }} value="San Juan">San Juan
                            </option>
                            <option {{ old('barrio_per') == 'Doña Ana' ? 'selected' : '' }} value="Doña Ana">Doña Ana
                            </option>
                        </select>
                        @error('barrio_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-12 mb-4">
                        <label for=""><b>DIRECCIÓN</b></label>
                        <textarea name="direccion_per" id="direccion_per"class="form-control @error('direccion_per') is-invalid @enderror">{{ old('direccion_per') }}</textarea>
                        @error('direccion_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>CONTRASEÑA</b></label>
                        <input type="password" name="contrasenia_per" id="contrasenia_per"
                            class="form-control @error('contrasenia_per') is-invalid @enderror"
                            value="{{ old('contrasenia_per') }}">
                        @error('contrasenia_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <label for=""><b>REPITA CONTRASEÑA</b></label>
                        <input type="password" name="re_contrasenia_per" id="re_contrasenia_per"
                            class="form-control @error('re_contrasenia_per') is-invalid @enderror"
                            value="{{ old('re_contrasenia_per') }}">
                        @error('re_contrasenia_per')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
        // Swal.fire({
        // title: 'Listo!',
        // text: 'Estudiante registrado con éxito.',
        // icon: 'success',
        // showConfirmButton: false,
        // });
        // lanzar_toast("error", "Información invalida!");
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    </script>
@endsection
