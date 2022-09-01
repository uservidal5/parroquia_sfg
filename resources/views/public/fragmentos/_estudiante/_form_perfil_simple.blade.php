<div class="col-12 col-md-6">
    <div class="form-group">
        <label>Cédula de Identidad</label>
        <input type="text" class="form-control @error('cedula_per') is-invalid @enderror" name="cedula_per"
            value="{{ old('cedula_per', $perfil->cedula_per) }}">
        @error('cedula_per')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-12 col-md-6">
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control @error('f_nacimiento_per') is-invalid @enderror"
            name="f_nacimiento_per" value="{{ old('f_nacimiento_per', $perfil->f_nacimiento_per) }}">
        @error('f_nacimiento_per')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-12 col-md-6">
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" class="form-control @error('apellido_per') is-invalid @enderror" name="apellido_per"
            value="{{ old('apellido_per', $perfil->apellido_per) }}">
        @error('apellido_per')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-12 col-md-6">
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" class="form-control @error('nombre_per') is-invalid @enderror" name="nombre_per"
            value="{{ old('nombre_per', $perfil->nombre_per) }}">
        @error('nombre_per')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-12">
    <div class="form-group">
        <label>Correo Electrónico</label>
        <input type="email" class="form-control @error('correo_per') is-invalid @enderror" name="correo_per"
            value="{{ old('correo_per', $perfil->correo_per) }}">
        <small class="form-text text-muted">
            Nunca compartiremos su correo electrónico con nadie más.
        </small>
        @error('correo_per')
            <br>
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
