@extends('template.dashboard')
@section('page_title')
    Cursos | Inicio
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text text-uppercase">Gestión de <span class="text-black fw-bold">Cursos</span></h1>
        </li>
    </ul>
@endsection
@section('css')
    <style>
        .lazy {
            opacity: 0;
            transition: opacity ease-in-out .5s;
        }
    </style>
@endsection

@section('body')
    <div class="row">
        <div class="col-12 text-end mb-4">
            <a href="{{ route('cursos.create') }}" class="btn btn-rounded btn-primary">
                NUEVO
                <i class="fas fa-plus ml-2"></i>
            </a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body lazy">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="tabla-cursos">
                            <thead>
                                <tr>
                                    <th scope="col" style="max-width: 1.5rem;">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Disponibilidad</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Costo</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col" class="">
                                        <i class="fas fa-cog mr-2"></i>
                                        <span class="d-none d-lg-inline-block">
                                            Acciones
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $curso->nombre_cur }}</td>
                                        <td class="text-center">
                                            @if ($curso->disponibilidad_cur)
                                                <label class="btn btn-rounded btn-inverse-success">
                                                    <i class="fas fa-eye d-md-none"></i>
                                                    <span class="d-none d-md-inline-block">Visible</span>
                                                </label>
                                            @else
                                                <label class="btn btn-rounded btn-inverse-danger">
                                                    <i class="fas fa-eye-slash d-md-none"></i>
                                                    <span class="d-none d-md-inline-block">Oculto</span>
                                                </label>
                                            @endif
                                        </td>
                                        <td>{{ $curso->fecha_inicio_cur }}</td>
                                        <td>{{ $curso->responsable_cur }}</td>
                                        <td>{{ "$ " . $curso->costo_cur }}</td>
                                        <td title="{{ $curso->comentario_cur }}">
                                            {{ Str::limit($curso->comentario_cur, 20, '...') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('cursos.edit', ['curso' => $curso]) }}" class="btn p-0">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form class="d-inline-block" style="width: min-content!important;"
                                                    action="{{ route('cursos.destroy', ['curso' => $curso]) }}"
                                                    method="POST" id="form-delete-{{ $curso->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button" onclick="borrarCurso('{{ $curso->id }}');"
                                                        class="btn text-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        $(async () => {
            await $("#tabla-cursos").DataTable({
                // scrollX: true,
            });
            $(".card-body").css("opacity", "1");
        });

        function borrarCurso(id) {
            Swal.fire({
                title: 'Espera!',
                text: '¿Deseas eliminar este registro?',
                icon: 'question',
                showConfirmButton: false,
                cancelButtonText: "Cancelar",
                showCancelButton: true,
                showDenyButton: true,
                denyButtonText: 'Si, deseo eliminar',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isDenied) {
                    Swal.fire('Listo', 'Registro eliminado con éxito!', 'success');
                    $(`#form-delete-${id}`).submit();
                }
            })
        }
    </script>
@endsection
