<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planilla de sueldos</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        @page {
            margin-top: 2cm;
            margin-bottom: 1cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            border: 5px solid blue;
        }

        * {}


        h4.area {
            text-align: center;
        }

        table {
            table-layout: fixed;
            width: 100%;
        }

        table tbody tr td {
            text-align: center;
            word-wrap: break-word;
            font-size: 0.7em;
            padding: 2px;
        }

        table thead tr th {
            font-size: 0.7em;
            text-align: center;
            border: solid 1px;
            word-wrap: break-word;
        }

        #contenedor_info {
            width: 100%;
            height: 55px;
        }


        #pie {
            position: absolute;
            width: 100%;
            font-size: 0.7em;
            display: block;
            bottom: 10px;
        }

        #pie div.nombre_empleador {
            width: 280px;
            left: 60px;
            display: inline-block;
            position: absolute;
        }

        #pie div.nro_documento {
            width: 210px;
            left: 460px;
            display: inline-block;
            position: absolute;
        }

        #pie div.firma {
            width: 150px;
            left: 800px;
            display: inline-block;
            position: absolute;
        }

        #pie div.fecha {
            width: 90px;
            left: 1060px;
            display: inline-block;
            position: absolute;
        }

        #pie div.nombre_empleador p {
            display: block;
            text-align: center;
            width: 100%;
        }

        #pie div.nro_documento p {
            display: block;
            text-align: center;
            width: 100%;
        }

        #pie div.firma p {
            display: block;
            text-align: center;
            width: 100%;
        }

        #pie div.fecha p {
            display: block;
            text-align: center;
            width: 100%;
        }

        #pie div.fecha span {
            display: block;
            width: 100%;
            text-align: center;
        }

        .titulo {
            font-weight: bold;
            width: 100%;
            text-align: center;
        }

        .texto {
            font-weight: bold;
            font-size: 1.1em;
            width: 100%;
            text-align: center;
        }

        .descripcion {
            width: 100%;
            text-align: center;
        }

        .info_empresa {
            width: 80%;
            margin: auto;
        }

        .info_empresa tbody tr td {
            font-size: 0.8em;
        }

        .izquierda {
            text-align: left;
        }

        .bold {
            font-weight: bold;
        }

        .centreado {
            text-align: center;
        }

        .pl-5 {
            padding-left: 5px;
        }

        .pr-5 {
            padding-right: 5px;
        }

        .pt-5 {
            padding-top: 5px;
        }

        .pb-5 {
            padding-bottom: 5px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.7/dist/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="titulo">PLANILLA DE SUELDOS Y SALARIOS</div>
    <div class="texto">PERSONAL PERMANENTE</div>
    <div class="descripcion">(En Bolivianos)</div>
    <table class="info_empresa">
        <tbody>
            <tr>
                <td class="bold izquierda" width="17%">NOMBRE O RAZÓN SOCIAL: </td>
                <td class="izquierda pl-5">{{ $empresa->name }}</td>
                <td class="bold izquierda" width="10%">N° EMPLEADOR</td>
                <td class="izquierda pl-5">{{ $empresa->nro_empleador }}}</td>
            </tr>
            <tr>
                <td class="bold izquierda">N° DE NIT:</td>
                <td class="izquierda pl-5">{{ $empresa->nit }}</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    @if ($sw == 1)
        @include('reportes.parcials.sw_planilla1')
    @endif

    @if ($sw == 2)
        @include('reportes.parcials.sw_planilla2')
    @endif

    @if ($sw == 3)
        @include('reportes.parcials.sw_planilla3')
    @endif

    @if ($sw == 4)
        @include('reportes.parcials.sw_planilla4')
    @endif

    @if ($sw == 5)
        @include('reportes.parcials.sw_planilla5')
    @endif

    @if ($sw == 6)
        @include('reportes.parcials.sw_planilla6')
    @endif

    @if ($sw == 7)
        @include('reportes.parcials.sw_planilla7')
    @endif

    @if ($sw == 8)
        @include('reportes.parcials.sw_planilla8')
    @endif

    <div id="pie">
        <div class="nombre_empleador">
            <span>........................................................................................................</span>
            <p>NOMBRE DEL EMPLEADOR O REPRESENTANTE LEGAL</p>
        </div>
        <div class="nro_documento">
            <span>.............................................................................</span>
            <p>N° DE DOCUMENTO DE IDENTIDAD</p>
        </div>
        <div class="firma">
            <span>........................................................</span>
            <p>FIRMA</p>
        </div>
        <div class="fecha">
            <span>{{ date('d-m-Y') }}</span>
            <p>FECHA</p>
        </div>
    </div>
</body>

</html>
