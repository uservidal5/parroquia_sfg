@csrf
<div class="col-12 col-md-6 mb-4">
    <label for=""><b>NUEVA CONTRASEÑA</b></label>
    <input type="password" name="contrasenia_per" class="form-control @error('contrasenia_per') is-invalid @enderror"
        value="{{ old('contrasenia_per') }}">
    @error('contrasenia_per')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-12 col-md-6 mb-4">
    <label for=""><b>REPITA NUEVA CONTRASEÑA</b></label>
    <input type="password" name="re_contrasenia_per"
        class="form-control @error('re_contrasenia_per') is-invalid @enderror" value="{{ old('re_contrasenia_per') }}">
    @error('re_contrasenia_per')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
