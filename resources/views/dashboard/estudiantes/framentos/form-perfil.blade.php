<div class="card shadow">
    <div class="card-header">
        <h3 class="card-title my-2">DATOS INFORMATIVOS</h3>
    </div>
    <div class="card-body">
        <form id="form-perfil" action="{{ route('estudiantes.update', ['perfil' => $perfil]) }}" method="POST"
            class="form-row">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $perfil->id }}">
            <div class="col-12 col-md-6 mb-4">
                <label for=""><b>CÉDULA</b></label>
                <input type="text" name="cedula_per" id="cedula_per" maxlength="10"
                    class="form-control @error('cedula_per') is-invalid @enderror"
                    value="{{ old('cedula_per') ?: $perfil->cedula_per }}">
                @error('cedula_per')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for=""><b>CORREO</b></label>
                <input type="email" name="correo_per" id="correo_per"
                    class="form-control @error('correo_per') is-invalid @enderror"
                    value="{{ old('correo_per') ?: $perfil->correo_per }}">
                @error('correo_per')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for=""><b>APELLIDOS</b></label>
                <input type="text" name="apellido_per" id="apellido_per"
                    class="form-control @error('apellido_per') is-invalid @enderror"
                    value="{{ old('apellido_per') ?: $perfil->apellido_per }}">
                @error('apellido_per')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for=""><b>NOMBRES</b></label>
                <input type="text" name="nombre_per" id="nombre_per"
                    class="form-control @error('nombre_per') is-invalid @enderror"
                    value="{{ old('nombre_per') ?: $perfil->nombre_per }}">
                @error('nombre_per')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
                <textarea name="direccion_per" id="direccion_per" class="form-control">{{ $perfil->direccion_per }}</textarea>
            </div>
        </form>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <a href="">
            <i class="fas fa-key mr-2"></i>
            Cambio de contraseña
        </a>
        <button type="button" onclick="$('#form-perfil').submit();" class="btn btn-info text-white">
            <i class="fas fa-save mr-2"></i>
            ACTUALIZAR
        </button>
    </div>
</div>
