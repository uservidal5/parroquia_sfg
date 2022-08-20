@csrf
<div class="col-12 mb-4">
    <div class="d-flex justify-content-around align-items-center">
        <div>
            <h3>INFORMACIÓN {{ $parental->tipo_parental_inf == 'PADRE' ? 'DEL PADRE' : 'DE LA MADRE' }} </h3>
        </div>
        <div>
            <label class="switch">
                <input type="checkbox" {{ old('estado_inf', $parental->estado_inf) ? 'checked' : '' }} name="estado_inf"
                    id="estado_inf_{{ $type }}" value="1">
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <hr>
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>APELLIDOS</b></label>
    <input type="text" class="form-control @error('apellido_inf') is-invalid @enderror" name="apellido_inf"
        value="{{ old('apellido_inf', $parental->apellido_inf) }}">
    @error('apellido_inf')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>NOMBRES</b></label>
    <input type="text" class="form-control @error('nombre_inf') is-invalid @enderror" name="nombre_inf"
        value="{{ old('nombre_inf', $parental->nombre_inf) }}">
    @error('nombre_inf')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>NÚMERO CELULAR</b></label>
    <input type="text" class="form-control @error('celular_inf') is-invalid @enderror" name="celular_inf"
        value="{{ old('celular_inf', $parental->celular_inf) }}">
    @error('celular_inf')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>BAUTIZO</b></label>
    <div class="d-flex justify-content-around align-items-center">
        <label>
            SI
            <input {{ $parental->bautizo_inf == 1 ? 'checked' : '' }} type="radio" name="bautizo_inf" id=""
                value="1">
        </label>
        <label>
            NO
            <input {{ $parental->bautizo_inf == 0 ? 'checked' : '' }} type="radio" name="bautizo_inf" id=""
                value="0">
        </label>
    </div>
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>COMUNIÓN</b></label>
    <div class="d-flex justify-content-around align-items-center">
        <label>
            SI
            <input {{ $parental->comunion_inf == 1 ? 'checked' : '' }} type="radio" name="comunion_inf"
                id="" value="1">
        </label>
        <label>
            NO
            <input {{ $parental->comunion_inf == 0 ? 'checked' : '' }} type="radio" name="comunion_inf"
                id="" value="0">
        </label>
    </div>
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>CONFIRMACIÓN</b></label>
    <div class="d-flex justify-content-around align-items-center">
        <label>
            SI
            <input {{ $parental->confirmacion_inf == 1 ? 'checked' : '' }} type="radio" name="confirmacion_inf"
                id="" value="1">
        </label>
        <label>
            NO
            <input {{ $parental->confirmacion_inf == 0 ? 'checked' : '' }} type="radio" name="confirmacion_inf"
                id="" value="0">
        </label>
    </div>
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <label for=""><b>MATRIMONIO ECLESIÁSTICO</b></label>
    <div class="d-flex justify-content-around align-items-center">
        <label>
            SI
            <input {{ $parental->matrimonio_inf == 1 ? 'checked' : '' }} type="radio" name="matrimonio_inf"
                id="si_matrimonio_inf_{{ $type }}" value="1">
        </label>
        <label>
            NO
            <input {{ $parental->matrimonio_inf == 0 ? 'checked' : '' }} type="radio" name="matrimonio_inf"
                id="no_matrimonio_inf_{{ $type }}" value="0">
        </label>
    </div>
</div>
<div class="form-{{ $type }} col-12 col-md-6 mb-4" style="display: none;">
    <div class="select-{{ $type }}-estado_civil_inf">
        <label for=""><b>ESTADO CIVIL</b></label>
        <select name="estado_civil_inf" id="" class="form-control">
            <option value=""></option>
            <option
                {{ $parental->estado_civil_inf == 'SOLTERO' || $parental->estado_civil_inf == 'SOLTERA' ? 'selected' : '' }}
                value="{{ $parental->tipo_parental_inf == 'PADRE' ? 'SOLTERO' : 'SOLTERA' }}">
                {{ $parental->tipo_parental_inf == 'PADRE' ? 'SOLTERO' : 'SOLTERA' }}
            </option>
            <option {{ $parental->estado_civil_inf == 'UNION_LIBRE' ? 'selected' : '' }} value="UNION_LIBRE">
                UNION LIBRE
            </option>
            <option
                {{ $parental->estado_civil_inf == 'DIVORCIADO' || $parental->estado_civil_inf == 'DIVORCIADA' ? 'selected' : '' }}
                value="{{ $parental->tipo_parental_inf == 'PADRE' ? 'DIVORCIADO' : 'DIVORCIADA' }}">
                {{ $parental->tipo_parental_inf == 'PADRE' ? 'DIVORCIADO' : 'DIVORCIADA' }}
            </option>
            <option
                {{ $parental->estado_civil_inf == 'VIUDO' || $parental->estado_civil_inf == 'VIUDA' ? 'selected' : '' }}
                value="{{ $parental->tipo_parental_inf == 'PADRE' ? 'VIUDO' : 'VIUDA' }}">
                {{ $parental->tipo_parental_inf == 'PADRE' ? 'VIUDO' : 'VIUDA' }}
            </option>
        </select>
    </div>
</div>
@push('js_footer')
    <script>
        $("#si_matrimonio_inf_{{ $type }}").change(() => {
            toggle_matrimonio("{{ $type }}");
        });
        $("#no_matrimonio_inf_{{ $type }}").change(() => {
            toggle_matrimonio("{{ $type }}");
        });

        $("#estado_inf_{{ $type }}").change(() => {
            form_parental("{{ $type }}");
        });
        //
        $(() => {
            form_parental("{{ $type }}");
        })
    </script>
@endpush
