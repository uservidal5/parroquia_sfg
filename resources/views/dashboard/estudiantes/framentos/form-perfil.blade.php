@csrf
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
    <input type="date" name="f_nacimiento_per" id="f_nacimiento_per"
        class="form-control @error('f_nacimiento_per') is-invalid @enderror"
        value="{{ old('f_nacimiento_per') ?: $perfil->f_nacimiento_per }}" max="{{ date('Y-m-d') }}">
    @error('f_nacimiento_per')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-12 col-md-6 mb-4">
    <label for=""><b>BARRIO</b></label>
    <select name="barrio_per" id="barrio_per" class="form-control">
        <option {{ old('barrio_per', $perfil->barrio_per) == '' ? 'selected' : '' }} value=""></option>
        <option
            {{ old('barrio_per', $perfil->barrio_per) == 'Centro de Guayllabamba' ? 'selected' : '' }}value="Centro de Guayllabamba">
            Centro de Guayllabamba</option>
        <option {{ old('barrio_per', $perfil->barrio_per) == 'Chaquibamba' ? 'selected' : '' }} value="Chaquibamba">
            Chaquibamba</option>
        <option {{ old('barrio_per', $perfil->barrio_per) == 'Los Duques' ? 'selected' : '' }} value="Los Duques">Los
            Duques
        </option>
        <option {{ old('barrio_per', $perfil->barrio_per) == 'San Pedro' ? 'selected' : '' }} value="San Pedro">San
            Pedro
        </option>
        <option {{ old('barrio_per', $perfil->barrio_per) == 'San Juan' ? 'selected' : '' }} value="San Juan">San Juan
        </option>
        <option {{ old('barrio_per', $perfil->barrio_per) == 'Doña Ana' ? 'selected' : '' }} value="Doña Ana">Doña Ana
        </option>
    </select>
</div>
<div class="col-12 col-md-12 mb-4">
    <label for=""><b>DIRECCIÓN</b></label>
    <textarea name="direccion_per" id="direccion_per" class="form-control">{{ old('direccion_per', $perfil->direccion_per) }}</textarea>
</div>
