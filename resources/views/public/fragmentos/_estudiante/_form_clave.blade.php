<div class="col-12 col-md-6">
    <div class="form-group">
        <label>Contraseña</label>
        <input type="password" class="form-control @error('contrasenia_per') is-invalid @enderror" name="contrasenia_per"
            value="{{ old('contrasenia_per') }}">
        @error('contrasenia_per')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-12 col-md-6">
    <div class="form-group">
        <label>Repetir Contraseña</label>
        <input type="password" class="form-control @error('re_contrasenia_per') is-invalid @enderror"
            name="re_contrasenia_per">
        @error('re_contrasenia_per')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
