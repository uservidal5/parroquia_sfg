<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MATRICULA</title>
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        /* Margin Papper*/
        @page {
            margin: 2cm 2cm 2cm 3cm;
        }

        body {
            margin: 0px;
        }

        .mr-2 {
            margin-right: .5rem;
        }

        .text-center {
            text-align: center;
        }

        .linea-firma {
            display: inline-block;
            width: 5.5cm;
            border-bottom: 1px solid black;
            padding-top: 5cm;
        }

        .img-cabecera {
            height: 3.5cm;
            max-width: 100%;
        }

        .text-principal {
            color: #043a90;
        }

        .mt-0 {
            margin-top: 0;
        }

        table {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        hr {
            border: none;
            border-bottom: 1px solid #1953af;
        }

    </style>
</head>

<body>
    <img class="img-cabecera" src="{{ asset('img/Logo PSFG-03.jpg') }}" alt="">
    <h2 class="text-principal">Información Estudiante:</h2>
    <table>
        <tr>
            <td colspan="2"><b class="mr-2">CI:</b><span>{{ $estudiante->cedula_per }}</span></td>
        </tr>
        <tr>
            <td class="w-50"><b class="mr-2">Apellido:</b><span>{{ $estudiante->apellido_per }}</span></td>
            <td class="w-50"><b class="mr-2">Nombre:</b><span>{{ $estudiante->nombre_per }}</span></td>
        </tr>
        <tr>
            <td class="w-50"><b class="mr-2">Parentesco Representante:</b><span>{{ $estudiante->tipo_representante_per }}</span>
            </td>
            <td class="w-50"><b class="mr-2">Teléfono Representante:</b><span>{{ $estudiante->telefono_representante_per }}</span>
            </td>
        </tr>
    </table>
    <hr>
    <h2 class="text-principal">Información Curso:</h2>
    <table>
        <tr>
            <td class="w-50"><b class="mr-2">Curso:</b><span>{{ $curso->nombre_cur }}</span></td>
            <td class="w-50"><b class="mr-2">Responsable:</b><span>{{ $curso->responsable_cur }}</span></td>
        </tr>
        <tr>
            <td colspan="2"><b class="mr-2">Comentario:</b><span>{{ $curso->comentario_cur }}</span></td>
        </tr>
    </table>
    <hr>
    <h2 class="text-principal">Información Matricula:</h2>
    <table>
        <tr>
            <td class="w-50">
                <b class="mr-2">Estado del pago:</b><span>{{ $matricula->pago_mat ? 'Pagada' : 'Sin pago' }}</span>
            </td>
            <td class="w-50"><b class="mr-2">Costo:</b><span>${{ $curso->costo_cur }}</span></td>
        </tr>
        <tr>
            <td class="w-50"><b class="mr-2">Periodo:</b><span>{{ $curso->fecha_inicio_cur }}</span></td>
            <td class="w-50"><b class="mr-2">Actualmente:</b><span>{{ $matricula->estado_mat }}</span></td>
        </tr>
        <tr>
            <td><b class="mr-2">Fecha impresión:</b><span>{{ date('Y-m-d') }}</span></td>
        </tr>
    </table>
    <hr>
    <table class="text-center">
        <tr>
            <td class="w-50">
                <span class="linea-firma"></span>
            </td>
            <td class="w-50">
                <span class="linea-firma"></span>
            </td>
        </tr>
        <tr>
            <td class="w-50">
                <span>Firma del Representante</span>
            </td>
            <td class="w-50">
                <span>
                    Sello de la Parroquia
                    San Francisco de Guayllabamba
                </span>
            </td>
        </tr>
    </table>
</body>

</html>
