@extends('public.protected.index')

@section('card_body')
    <div class="row">
        <div class="col-12 mb-4">
            <h1><span class="text-muted">Gestiona tu</span> Información Parental</h1>
        </div>
        <div class="col-12 mb-5">
            <div class="d-flex justify-content-around">
                <a class="btn {{ $parental == 'padre' ? 'btn-primary' : 'btn-outline-primary' }}"
                    href="{{ route('inicio_estudiante.index', ['tab' => 'informacion_parental', 'parental' => 'padre']) }}">
                    <i class="fa-solid fa-person mr-2"></i>
                    Información del Padre
                </a>
                <a class="btn {{ $parental == 'madre' ? 'btn-primary' : 'btn-outline-primary' }}"
                    href="{{ route('inicio_estudiante.index', ['tab' => 'informacion_parental', 'parental' => 'madre']) }}">
                    <i class="fa-solid fa-person-dress mr-2"></i>
                    Información de la Madre
                </a>
            </div>
        </div>
        <div class="col-12 col-md-10 mx-auto mb-4">
            <form action="{{ route('public_informacion_parental.update', ['informacion_parental' => $info_parental]) }}"
                id="form-{{ $parental }}" class="form-row" method="POST">
                @method('PUT')
                {{--  --}}
                @include('dashboard.estudiantes.framentos.form-parental', [
                    'parental' => $info_parental,
                    'type' => $parental,
                ])
                {{--  --}}
            </form>
        </div>
        <div class="col-12 col-md-10 mx-auto mb-4 text-right">
            <button type="button" onclick="$('#form-{{ $parental }}').submit();" class="btn btn-primary">
                <i class="fas fa-save mr-2"></i>
                Actualizar
            </button>
        </div>


    </div>
@endsection
@push('js_footer')
    <script>
        const toggle_matrimonio = (tipo) => {
            const estado = $(`#si_matrimonio_inf_${tipo}`).prop("checked");
            if (estado) {
                $(`.select-${tipo}-estado_civil_inf`).hide();
                $(`.select-${tipo}-estado_civil_inf`).find("select>option:selected").removeAttr("selected");
            } else {
                $(`.select-${tipo}-estado_civil_inf`).show();
            }
        }

        function form_parental(tipo) {
            const estado = $(`#estado_inf_${tipo}`).prop("checked");
            if (estado) {
                $(`.form-${tipo}`).fadeIn();
            } else {
                $(`.form-${tipo}`).hide();
                $(`.form-${tipo}`).find("input[type='text']").val("");
                $(`.form-${tipo}`).find("input[type='radio'][value='0']").prop("checked", true);
            }

            toggle_matrimonio(tipo);

        }
    </script>
@endpush
