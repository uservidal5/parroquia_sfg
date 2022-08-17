@extends('template.dashboard')
@section('page_title')
    Cursos | Editar Curso
@endsection
@section('name_section')
    <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text text-uppercase">Editar <span class="text-black fw-bold">Curso</span></h1>
        </li>
    </ul>
@endsection

@section('body')
    <div class="row">
        <div class="col-10 mx-auto mb-4">
            <a href="{{ route('cursos.index') }}" class="">
                <i class="fas fa-angle-left mr-2"></i>
                ATRAS
            </a>
        </div>
        <div class="col-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cursos.update', ['curso' => $curso]) }}" method="POST" class="form-row"
                        id="form-edit-curso">
                        @csrf @method('PUT')
                        @include('dashboard.cursos.fragmentos._form')
                    </form>
                </div>
                <div class="card-footer text-end">
                    <button type="button" class="btn btn-info" onclick="$('#form-edit-curso').submit();">
                        <i class="fas fa-save mr-2"></i>
                        Editar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("#nombre_cur").change(() => {
            const selected = $("#nombre_cur option:selected").data("nivel");
            $("#nivel_cur").val(selected);
        });
    </script>
    @include('dashboard.fragemtos.form-status')
@endsection
