<input type="hidden" name="nivel_cur" id="nivel_cur" value="{{ old('nivel_cur', $curso->nivel_cur) }}">
<div class="col-12 col-md-4 mb-4">
    <label>Periodo de Inicio</label>
    <input type="date" class="form-control" value="{{ old('fecha_inicio_cur', $curso->fecha_inicio_cur) }}"
        name="fecha_inicio_cur">
</div>
<div class="col-12 col-md-4 mb-4">
    <label>Curso</label>
    <select id="nombre_cur" class="form-control" name="nombre_cur">
        <option value="" data-nivel="0"></option>
        <option {{ old('nombre_cur', $curso->nombre_cur) == 'Iniciación' ? 'selected' : '' }} data-nivel="1"
            value="Iniciación">Iniciación
        </option>
        <option {{ old('nombre_cur', $curso->nombre_cur) == 'Comunión I' ? 'selected' : '' }} data-nivel="2"
            value="Comunión I">Comunión I
        </option>
        <option {{ old('nombre_cur', $curso->nombre_cur) == 'Comunión II' ? 'selected' : '' }} data-nivel="3"
            value="Comunión II">
            Comunión II</option>
        <option {{ old('nombre_cur', $curso->nombre_cur) == 'Año Bíblico' ? 'selected' : '' }} data-nivel="4"
            value="Año Bíblico">
            Año Bíblico</option>
        <option {{ old('nombre_cur', $curso->nombre_cur) == 'Confirmación I' ? 'selected' : '' }} data-nivel="5"
            value="Confirmación I">
            Confirmación I</option>
        <option {{ old('nombre_cur', $curso->nombre_cur) == 'Confirmación II' ? 'selected' : '' }} data-nivel="6"
            value="Confirmación II">
            Confirmación II</option>
    </select>
</div>
<div class="col-12 col-md-4 mb-4">
    <div class="d-flex mt-4 justify-content-center align-items-center">
        <label for="" class="mr-4">DISPONIBILIDAD</label>
        <label class="switch">
            <input type="checkbox" {{ old('disponibilidad_cur', $curso->disponibilidad_cur) == '1' ? 'checked' : '' }}
                name="disponibilidad_cur" id="disponibilidad_cur" value="1">
            <span class="slider round"></span>
        </label>
    </div>
</div>
<div class="col-12 col-md-6 mb-4">
    <label>Responsable</label>
    <input type="text" class="form-control  @error('responsable_cur') is-invalid @enderror"
        name="responsable_cur"value="{{ old('responsable_cur', $curso->responsable_cur) }}">
    @error('responsable_cur')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-12
        col-md-6 mb-4">
    <label>Costo</label>
    <input type="number" placeholder="$ 0.00" min="0" max="10000.00" step="0.01"
        class="form-control  @error('costo_cur') is-invalid @enderror"value="{{ old('costo_cur', $curso->costo_cur) }}"
        name="costo_cur" />
    @error('costo_cur')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="col-12 col-md-12 mb-4">
    <label>Comentario</label>
    <textarea name="comentario_cur" class="form-control" id="">{{ old('comentario_cur', $curso->comentario_cur) }}</textarea>
</div>
