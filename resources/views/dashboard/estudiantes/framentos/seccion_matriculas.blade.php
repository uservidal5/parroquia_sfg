<div class="row">
    <div class="col-12 col-md-6">
        <div class="card mb-4 rounded-lg">
            <h2 class="card-header py-2"><span class="text-muted">Tus</span> Cursos</h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        @foreach ($matriculado as $matricula)
                            <div class="row py-2 border-bottom">
                                <div class="col-6 mb-2">
                                    <span class="circle rounded-circle text-white bg-primary">
                                        {{ $matricula->nivel_cur }}
                                    </span>
                                </div>
                                <div class="col-6 text-end mb-2">
                                    <div class="dropdown">
                                        <button class="btn btn-sm" type="button" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <button class="dropdown-item" type="button">Action</button> --}}
                                            <a href="{{ route('matricula.generarPDF', ['matricula' => $matricula]) }}"
                                                class="dropdown-item" target="_blank">
                                                <i class="fas fa-file-pdf mr-2"></i>
                                                Descargar PDF
                                            </a>
                                            <button type="button" data-toggle="modal"
                                                data-matricula="{{ $matricula->matricula_id }}"
                                                data-estado="{{ $matricula->estado_mat }}"
                                                data-pago="{{ $matricula->pago_mat }}" data-target="#modalMatricula"
                                                class="dropdown-item">
                                                <i class="fas fa-pen mr-2"></i>
                                                Editar
                                            </button>
                                            <button type="button"
                                                onclick="deleteMatricula('{{ $matricula->matricula_id }}')"
                                                class="dropdown-item text-danger">
                                                <i class="fas fa-trash mr-2"></i>
                                                Remover
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <article>
                                        <span class="fw-bold mr-2">
                                            {{ $matricula->nombre_cur }}
                                        </span>
                                        <br>
                                        <small class="text-muted mb-0">{{ $matricula->responsable_cur }}</small>
                                    </article>
                                    <span
                                        class="badge px-2 py-1 badge-opacity-{{ $matricula->estado_mat == 'En curso' ? 'warning' : ($matricula->estado_mat == 'Aprobado' ? 'success' : 'danger') }}">
                                        {{ $matricula->estado_mat }}
                                    </span>
                                    <span
                                        class="badge px-2 py-1 badge-opacity-{{ $matricula->pago_mat ? 'success' : 'danger' }}">
                                        {{ $matricula->pago_mat ? 'Pagado' : 'Sin pago' }}
                                    </span>
                                </div>
                                <div class="col-12 mb-2">

                                </div>
                                {{-- Footer --}}
                                <div class="col-12 text-muted text-small text-end">
                                    <b>Periodo:</b> {{ $matricula->fecha_inicio_cur }}
                                </div>
                                <form action="{{ route('matriculas.destroy', ['matricula' => $matricula]) }}"
                                    id="form-delete-matricula-{{ $matricula->matricula_id }}" method="POST"
                                    class="d-inline-block mb-2">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        @endforeach
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
                        {{-- Item --}}
                        @foreach ($inscribibles as $curso)
                            <div class="row py-2 border-bottom">
                                <div class="col-12 mb-2">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="circle rounded-circle text-white bg-primary">
                                            {{ $curso->nivel_cur }}
                                        </span>
                                        <button type="button" onclick="newMatricula('{{ $curso->id }}')"
                                            class="btn btn-outline-info btn-sm">
                                            Inscribir
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <article>
                                        <span class="fw-bold mr-2">
                                            {{ $curso->nombre_cur }}
                                        </span>
                                        <br>
                                        <small class="text-muted mb-0">{{ $curso->responsable_cur }}</small>
                                    </article>
                                </div>
                                <div class="col-12">
                                    <div class="text-muted text-small text-end">
                                        <b>Periodo:</b> {{ $curso->fecha_inicio_cur }}
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <form action="{{ route('matriculas.store') }}" id="form-new-matricula-{{ $curso->id }}"
                                method="POST" class="d-inline-block mb-2">
                                @csrf
                                <input type="hidden" name="perfil_id" value="{{ $perfil_id }}">
                                <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                            </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
