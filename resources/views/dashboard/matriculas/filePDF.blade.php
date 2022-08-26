<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MATRICULA</title>
    <style>
        .mr-2 {
            margin-right: .5rem;
        }

        .text-center {
            text-align: center;
        }

        .linea-firma {
            display: inline-block;
            width: 5cm;
            border-bottom: 1px solid black;
            padding-top: 2cm;
        }
    </style>
</head>

<body>
    <h1 class="text-center">
        Matricula
    </h1>
    <h2>Información Estudiante:</h2>
    <article>
        <ul>
            <li><b class="mr-2">CI:</b><span>{{ $estudiante->cedula_per }}</span></li>
            <li><b class="mr-2">Apellido:</b><span>{{ $estudiante->apellido_per }}</span></li>
            <li><b class="mr-2">Nombre:</b><span>{{ $estudiante->nombre_per }}</span></li>
            <li><b class="mr-2">Fecha Nacimiento:</b><span>{{ $estudiante->f_nacimiento_per }}</span></li>
            <li><b class="mr-2">Barrio:</b><span>{{ $estudiante->barrio_per }}</span></li>
            <li><b class="mr-2">Dirección:</b><span>{{ $estudiante->direccion_per }}</span></li>
            <li><b class="mr-2">Parentesco Representante:</b><span>{{ $estudiante->tipo_representante_per }}</span>
            </li>
            <li><b class="mr-2">Teléfono Representante:</b><span>{{ $estudiante->telefono_representante_per }}</span>
            </li>
        </ul>
    </article>
    <hr>
    <h2>Información Curso:</h2>
    <article>
        <ul>
            <li><b class="mr-2">Nivel:</b><span>{{ $curso->nivel_cur }}</span></li>
            <li><b class="mr-2">Nombre del Curso:</b><span>{{ $curso->nombre_cur }}</span></li>
            <li><b class="mr-2">Disponiblidad:</b><span>{{ $curso->disponibilidad_cur ? 'Si' : 'No' }}</span></li>
            <li><b class="mr-2">Periodo:</b><span>{{ $curso->fecha_inicio_cur }}</span></li>
            <li><b class="mr-2">Responsable:</b><span>{{ $curso->responsable_cur }}</span></li>
            <li><b class="mr-2">Costo:</b><span>${{ $curso->costo_cur }}</span></li>
            <li><b class="mr-2">Comentario:</b><span>{{ $curso->comentario_cur }}</span></li>
        </ul>
    </article>
    <hr>
    <h2>Información Matricula:</h2>
    <article>
        <ul>
            <li><b class="mr-2">Estado del pago:</b><span>{{ $matricula->pago_mat ? 'Pagado' : 'Sin pago' }}</span>
            </li>
            <li><b class="mr-2">Estado:</b><span>{{ $matricula->estado_mat }}</span></li>
        </ul>
    </article>
    <hr>
    <h3 class="text-center">Firma</h3>
    <div class="text-center">
        <span class="linea-firma"></span>
        <p>
            {{ Auth::user()->name }}
        </p>
    </div>
</body>

</html>
