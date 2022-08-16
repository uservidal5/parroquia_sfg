<div class="card">
    <div class="card-body">
        <form>
            <h3>INFORMACIÓN DE LA FICHA</h3>
            <div class="col-12 col-md-6 mb-4">
                <label for=""><b>FECHA DE BAUTIZO</b></label>
                <input type="date" name="f_bautizo_fic" id="f_bautizo_fic" class="form-control"
                    value="{{ $ficha->f_bautizo_fic }}">
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>INICIACIÓN</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $ficha->iniciacion_fic == 1 ? 'checked' : '' }} type="radio" name="iniciacion_fic"
                            id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $ficha->iniciacion_fic == 0 ? 'checked' : '' }} type="radio" name="iniciacion_fic"
                            id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>COMUNIÓN I</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $ficha->comunion_i_fic == 1 ? 'checked' : '' }} type="radio" name="comunion_i_fic"
                            id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $ficha->comunion_i_fic == 0 ? 'checked' : '' }} type="radio" name="comunion_i_fic"
                            id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>COMUNIÓN II</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $ficha->comunion_ii_fic == 1 ? 'checked' : '' }} type="radio" name="comunion_ii_fic"
                            id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $ficha->comunion_ii_fic == 0 ? 'checked' : '' }} type="radio" name="comunion_ii_fic"
                            id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>AÑO BIBLICO</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $ficha->anio_biblico_fic == 1 ? 'checked' : '' }} type="radio"
                            name="anio_biblico_fic" id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $ficha->anio_biblico_fic == 0 ? 'checked' : '' }} type="radio"
                            name="anio_biblico_fic" id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>AÑO BIBLICO</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $ficha->confirmacion_i_fic == 1 ? 'checked' : '' }} type="radio"
                            name="confirmacion_i_fic" id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $ficha->confirmacion_i_fic == 0 ? 'checked' : '' }} type="radio"
                            name="confirmacion_i_fic" id="" value="0">
                    </label>
                </div>
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>CONFIMACIÓN II</b></label>

                <div class="d-flex justify-content-around align-items-center">
                    <label>
                        SI
                        <input {{ $ficha->confirmacion_ii_fic == 1 ? 'checked' : '' }} type="radio"
                            name="confirmacion_ii_fic" id="" value="1">
                    </label>
                    <label>
                        NO
                        <input {{ $ficha->confirmacion_ii_fic == 0 ? 'checked' : '' }} type="radio"
                            name="confirmacion_ii_fic" id="" value="0">
                    </label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <label for=""><b>PARENTESCO REPRESENTANTE</b></label>
                <select name="parentesco_representante_fic" id="parentesco_representante_fic" class="form-control">
                    <option {{ $ficha->parentesco_representante_fic == 'Padre' ? 'selected' : '' }} value="Padre">
                        Padre
                    </option>
                    <option {{ $ficha->parentesco_representante_fic == 'Madre' ? 'selected' : '' }} value="Madre">
                        Madre
                    </option>
                    <option {{ $ficha->parentesco_representante_fic == 'Abuelito/a' ? 'selected' : '' }}
                        value="Abuelito/a">Abuelito/a
                    </option>
                    </option>
                    <option {{ $ficha->parentesco_representante_fic == 'Hermano/a' ? 'selected' : '' }}
                        value="Hermano/a">Hermano/a
                    </option>
                    </option>
                    <option {{ $ficha->parentesco_representante_fic == 'Tío/a' ? 'selected' : '' }} value="Tío/a">
                        Tío/a
                    </option>
                    </option>
                    <option {{ $ficha->parentesco_representante_fic == 'Primo/a' ? 'selected' : '' }} value="Primo/a">
                        Primo/a
                    </option>
                </select>
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>CELULAR</b></label>
                <input type="text" class="form-control" value="{{ $ficha->celular_representante_fic }}">
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>CORREO</b></label>
                <input type="text" class="form-control" value="{{ $ficha->correo_representante_fic }}">
            </div>
            <div class="form-ficha col-12 col-md-6 mb-4">
                <label for=""><b>OBSERVACIONES</b></label>
                <input type="text" class="form-control" value="{{ $ficha->observaciones_fic }}">
            </div>
        </form>
    </div>
</div>
