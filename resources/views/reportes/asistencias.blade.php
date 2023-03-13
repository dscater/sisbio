<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asistencias</title>
    <style>
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 1cm;
            margin-bottom: 1cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            border: 5px solid blue;
        }

        * {
            font-family: sans-serif;
        }

        #encabezado {
            width: 100%;
        }

        img.logo {
            width: 200px;
            height: 160px;
            position: absolute;
            top: -40px;
            left: 0px;
        }

        #encabezado>h2 {
            font-size: 1.1em;
            position: relative;
            top: 15px;
            text-align: center;
            font-family: sans-serif;
            width: 650px;
            margin: auto;
        }

        #encabezado>h4.titulo_pdf {
            margin-top: 35px;
        }

        #encabezado>h4 {
            font-size: 1.2em;
            text-align: center;
            font-family: sans-serif;
        }

        h4.area {
            font-family: sans-serif;
            text-align: center;
            font-size: 0.85em;
        }

        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
        }

        table tbody tr td {
            text-align: center;
            word-wrap: break-word;
            font-size: 0.65em;
            padding: 2px;
        }

        table thead tr th {
            font-size: 0.65em;
            text-align: center;
            word-wrap: break-word;
        }

        .izquierda {
            text-align: left;
        }
    </style>
</head>

<body>
    <img class="logo" src="{{ asset('imgs/' . $empresa->logo) }}" alt="logo">
    <div id="encabezado">
        <h2>{{ $empresa->name }}</h2>
        <h4 class="titulo_pdf">CONTROL DE ASISTENCIA</h4>
        @if ($sw == 1)
            <h4 style="font-size:0.85em;">(CORRESPODIENTE A TODOS LOS MESES Y AÑOS)</h4>
        @endif
        @if ($sw == 2 || $sw == 6)
            <h4 style="font-size:0.85em;">(CORRESPODIENTE AL MES DE {{ $array_mes_pdf[$valor_mes] }} DEL AÑO
                {{ $valor_anio }})</h4>
        @endif
        @if ($sw == 7)
            <h4 style="font-size:0.85em;">(CORRESPODIENTE AL AÑO {{ $valor_anio }})</h4>
        @endif
    </div>

    @if ($sw == 1)
        @include('reportes.parcials.sw1')
    @endif

    @if ($sw == 2)
        @include('reportes.parcials.sw2')
    @endif

    @if ($sw == 3)
        @include('reportes.parcials.sw3')
    @endif

    @if ($sw == 4)
        @include('reportes.parcials.sw4')
    @endif

    @if ($sw == 5)
        @include('reportes.parcials.sw5')
    @endif

    @if ($sw == 6)
        @include('reportes.parcials.sw6')
    @endif

    @if ($sw == 7)
        @include('reportes.parcials.sw7')
    @endif

    @if ($sw == 8)
        @include('reportes.parcials.sw8')
    @endif
</body>

</html>
