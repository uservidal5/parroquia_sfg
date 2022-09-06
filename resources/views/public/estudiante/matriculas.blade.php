@extends('public.protected.index')

@section('card_body')
    <div class="row">
        <div class="col-12 mb-4">
            <h1><span class="text-muted">Gestiona tus</span> Matriculas</h1>
        </div>
        <div class="col-12 col-md-4 mx-auto">
            <h2 class="text-center mb-4"><span class="text-muted">Tus Matriculas</span> Registradas</h2>
            @if ($matriculado)
                @foreach ($matriculado as $matricula)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $matricula->nivel_cur }} | {{ $matricula->nombre_cur }}
                            </h5>
                            @if ($matricula->comentario_cur)
                                <p class="card-text">{{ $matricula->comentario_cur }}</p>
                            @endif
                            <p>
                                Responsable: <span>{{ $matricula->responsable_cur }}</span>
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('matricula.generarPDF', ['matricula' => $matricula]) }}"
                                    class="badge px-2 py-1 badge-light text-info mr-auto" target="_blank">
                                    <i class="fas fa-file-pdf mr-2"></i>
                                    <span class="d-none d-md-inline">Descargar</span>
                                    PDF
                                </a>
                                <span
                                    class="badge px-2 py-1 mr-2 badge-{{ $matricula->estado_mat == 'En curso' ? 'warning' : ($matricula->estado_mat == 'Aprobado' ? 'success' : 'danger') }}">
                                    {{ $matricula->estado_mat }}
                                </span>
                                <span class="badge px-2 py-1 badge-{{ $matricula->pago_mat ? 'success' : 'danger' }}">
                                    {{ $matricula->pago_mat ? 'Pagado' : 'Sin pago' }}
                                </span>

                            </div>
                        </div>
                        <div class="card-footer text-muted text-center">
                            Periodo:
                            {{ $matricula->fecha_inicio_cur }}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-12 col-md-4 mx-auto">
            <h2 class="text-center mb-4"><span class="text-muted">Cursos </span>Disponibles</h2>
            @if ($inscribibles)
                @foreach ($inscribibles as $inscribible)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $inscribible->nivel_cur }} | {{ $inscribible->nombre_cur }}
                            </h5>
                            @if ($inscribible->comentario_cur)
                                <p class="card-text">{{ $inscribible->comentario_cur }}</p>
                            @endif
                            <p>
                                Responsable: <span>{{ $inscribible->responsable_cur }}</span>
                            </p>
                            <div class="text-right">
                                <button type="button" onclick="newMatricula('{{ $inscribible->id }}');"
                                    class="btn btn-primary">Incribirme</button>
                            </div>
                            {{-- {{ $inscribible }} --}}
                        </div>
                        <div class="card-footer text-muted text-center">
                            Periodo:
                            {{ $inscribible->fecha_inicio_cur }}
                        </div>
                    </div>
                    <form action="{{ route('public_matriculas.store') }}" id="form-new-matricula-{{ $inscribible->id }}"
                        method="POST" class="">
                        @csrf
                        <input type="hidden" name="perfil_id" value="{{ $perfil->id }}">
                        <input type="hidden" name="curso_id" value="{{ $inscribible->id }}">
                    </form>
                @endforeach
            @endif
        </div>
    </div>
@endsection
@push('js_footer')
    <script>
        const newMatricula = (id) => {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Deseas matricularte en este registro?',
                icon: 'question',
                showConfirmButton: true,
                confirmButtonText: 'Si, confirmar',
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                // showDenyButton: true,
                // denyButtonText: 'Si, confirmar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $(`#form-new-matricula-${id}`).submit();
                }
            })
        }
    </script>
@endpush
