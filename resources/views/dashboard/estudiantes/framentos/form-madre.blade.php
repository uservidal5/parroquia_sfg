<div class="card">
    <div class="card-body">
        <form action="{{ route('informacion_parental.update', ['informacion_parental' => $madre]) }}"id="form-madre"
            class="form-row" method="POST">
            @csrf
            @method('PUT')
            <div class="col-12 mb-4">
                <div class="d-flex justify-content-around align-items-center">
                    <div>
                        <h3>INFORMACIÓN DE LA MADRE</h3>
                    </div>
                    <div>
                        <label class="switch">
                            <input type="checkbox" {{ $madre->estado_inf ? 'checked' : '' }} name="estado_inf"
                                id="estado_inf_madre" value="1">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <hr>
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b>APELLIDOS</b></label>
                <input type="text" class="form-control" name="apellido_inf" value="{{ $madre->apellido_inf }}">
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b>NOMBRES</b></label>
                <input type="text" class="form-control" name="nombre_inf" value="{{ $madre->nombre_inf }}">
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b># CELULAR</b></label>
                <input type="text" class="form-control" name="celular_inf" value="{{ $madre->celular_inf }}">
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b>BAUTIZO</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $madre->bautizo_inf == 1 ? 'checked' : '' }} type="radio" name="bautizo_inf"
                            id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $madre->bautizo_inf == 0 ? 'checked' : '' }} type="radio" name="bautizo_inf"
                            id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b>COMUNIÓN</b></label>
                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $madre->comunion_inf == 1 ? 'checked' : '' }} type="radio" name="comunion_inf"
                            id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $madre->comunion_inf == 0 ? 'checked' : '' }} type="radio" name="comunion_inf"
                            id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b>CONFIRMACIÓN</b></label>
                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $madre->confirmacion_inf == 1 ? 'checked' : '' }} type="radio"
                            name="confirmacion_inf" id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $madre->confirmacion_inf == 0 ? 'checked' : '' }} type="radio"
                            name="confirmacion_inf" id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <label for=""><b>MATRIMONIO ECLESIÁSTICO</b></label>
                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $madre->matrimonio_inf == 1 ? 'checked' : '' }} type="radio" name="matrimonio_inf"
                            id="si_matrimonio_inf_madre" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $madre->matrimonio_inf == 0 ? 'checked' : '' }} type="radio" name="matrimonio_inf"
                            id="no_matrimonio_inf_madre" value="0">
                    </label>
                </div>
            </div>
            <div class="form-madre col-12 col-md-6 mb-4" style="display: none;">
                <div class="select-madre-estado_civil_inf">
                    <label for=""><b>ESTADO CIVIL</b></label>
                    <select name="estado_civil_inf" id="" class="form-control">
                        <option {{ $madre->estado_civil_inf == 'SOLTERO' ? 'selected' : '' }} value="SOLTERO">
                            SOLTERO</option>
                        <option {{ $madre->estado_civil_inf == 'UNION_LIBRE' ? 'selected' : '' }} value="UNION_LIBRE">
                            UNION
                            LIBRE</option>
                        <option {{ $madre->estado_civil_inf == 'DIVORCIADO' ? 'selected' : '' }} value="DIVORCIADO">
                            DIVORCIADO</option>
                        <option {{ $madre->estado_civil_inf == 'VIUDO' ? 'selected' : '' }} value="VIUDO">
                            VIUDO</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
@push('js_footer')
    <script>
        $("#si_matrimonio_inf_madre").change(() => {
            toggle_matrimonio("madre");
        });
        $("#no_matrimonio_inf_madre").change(() => {
            toggle_matrimonio("madre");
        });

        $("#estado_inf_madre").change(() => {
            form_parental("madre");
        });
    </script>
@endpush
