<div class="row">
    <div class="col-12 col-md-6">
        <div class="card mb-4 rounded-lg">
            <h2 class="card-header py-2"><span class="text-muted">Tus</span> Cursos</h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <ul>
                            @foreach ($matriculado as $matricula)
                                <div
                                    class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div class="d-flex">
                                        {{-- Ciclo / Nivel --}}
                                        <span style="width: 2rem; height: 2rem;"
                                            class="rounded-circle text-white bg-primary d-flex justify-content-center align-items-center">
                                            {{ $matricula->nivel_cur }}
                                        </span>
                                        <div class="wrapper ms-3">
                                            <p class="mb-1 fw-bold">{{ $matricula->nombre_cur }}</p>
                                            <small class="text-muted mb-0">{{ $matricula->responsable_cur }}</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        {{-- Acciones --}}
                                        <form action="{{ route('matriculas.destroy', ['matricula' => $matricula]) }}"
                                            id="form-delete-matricula-{{ $matricula->matricula_id }}" method="POST"
                                            class="d-inline-block mb-2">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button type="button" data-toggle="modal"
                                            data-matricula="{{ $matricula->matricula_id }}"
                                            data-estado="{{ $matricula->estado_mat }}"
                                            data-pago="{{ $matricula->pago_mat }}" data-target="#modalMatricula"
                                            class="btn p-0 mr-2">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <button type="button"
                                            onclick="deleteMatricula('{{ $matricula->matricula_id }}')"
                                            class="btn btn-inverse-danger btn-sm">
                                            Remover
                                        </button>
                                        {{-- Fecha --}}
                                        <div class="text-muted text-small ">
                                            <b>Periodo:</b> {{ $matricula->fecha_inicio_cur }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card mb-4 rounded-lg">
            <h2 class="card-header py-2"><span class="text-muted">En</span> Inscripción</h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="">
                            {{-- Item --}}
                            @foreach ($inscribibles as $curso)
                                <div
                                    class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                    <div class="d-flex">
                                        {{-- Ciclo / Nivel --}}
                                        <span style="width: 2rem; height: 2rem;"
                                            class="rounded-circle text-white bg-primary d-flex justify-content-center align-items-center">
                                            {{ $curso->nivel_cur }}
                                        </span>
                                        <div class="wrapper ms-3">
                                            <p class="mb-1 fw-bold">{{ $curso->nombre_cur }}</p>
                                            <small class="text-muted mb-0">{{ $curso->responsable_cur }}</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        {{-- Acciones --}}
                                        <form action="{{ route('matriculas.store') }}"
                                            id="form-new-matricula-{{ $curso->id }}" method="POST"
                                            class="d-inline-block mb-2">
                                            @csrf
                                            <input type="hidden" name="perfil_id" value="{{ $perfil_id }}">
                                            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                                        </form>
                                        <button type="button" onclick="newMatricula('{{ $curso->id }}')"
                                            class="btn btn-outline-info btn-sm">
                                            Inscribir
                                        </button>
                                        {{-- Fecha --}}
                                        <div class="text-muted text-small ">
                                            <b>Periodo:</b> {{ $curso->fecha_inicio_cur }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
