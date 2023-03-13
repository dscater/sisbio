<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleta de pago</title>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            position: relative;
        }

        @page {
            margin-top: 1cm;
            margin-bottom: 1cm;
            margin-left: 2.5cm;
            margin-right: 2.5cm;
            border: 5px solid blue;
        }

        #logo_empresa {
            position: relative;
            top: -10px;
            left: -60px;
            width: 290px;
            height: 180px;
            margin-bottom: 15px;
        }

        #logo_empresa div.logo {
            display: flex;
        }

        #logo_empresa div.logo img.logo {
            display: flex;
            margin-left: 20px;
            width: 250px;
            height: 160px;
            border: solid 1px rgb(0, 0, 0);
        }

        #logo_empresa div.empresa {
            width: 100%;
            text-align: center;
            margin-top: -20px;
        }

        #titulo_doc {
            position: absolute;
            width: 100%;
            top: 140px;
            left: 350px;
            font-size: 1.5em;
            font-weight: bold;
        }

        #datos_boleta {
            font-weight: bold;
            font-size: 0.95em;
            position: absolute;
            right: 15px;
            top: 15px;
            width: 250px;
        }

        #datos_boleta table {
            width: 100%;
        }

        #datos_boleta table tbody td.nombre_campo {
            width: 50%;
        }

        #datos_personal {
            font-size: 0.9em;
            width: 100%;
        }

        #datos_personal table {
            width: 100%;
        }

        #datos_personal table tbody td.nombre_campo_personal1 {
            width: 35%;
            text-align: left;
        }

        #datos_personal table tbody td.campo_info1 {
            width: 65%;
            text-align: left;
        }

        #datos_personal table tbody td.nombre_campo_personal2 {
            width: 50%;
            text-align: left;
        }

        #datos_personal table tbody td.campo_info2 {
            width: 50%;
            text-align: left;
        }

        #titulo_boleta {
            width: 100%;
            text-align: center;
            font-size: 0.9em;
            border-top: solid 1px rgb(0, 0, 0);
            border-bottom: solid 1px rgb(0, 0, 0);
        }

        #datos_pago {
            font-size: 0.9em;
            width: 100%;
        }

        #datos_pago table {
            margin-top: 5px;
            width: 100%;
        }

        #datos_pago table tbody tr.titulo_pago td {
            text-align: center;
            width: 50%;
            border: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago td.columna_pago1 {
            padding-left: 10px;
            border-left: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago td.columna_pago2.haber {
            padding-left: 130px;
            text-align: center;
        }

        #datos_pago table tbody tr.fila_pago td.columna_pago2 {
            border-right: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago td.columna_pago2.descuento {
            text-align: right;
            padding-right: 25px;
        }

        #datos_pago table tbody tr.fila_pago_totales td.columna_pago1 {
            text-align: right;
            padding-right: -55px;
            border-left: solid 1px rgb(0, 0, 0);
            border-bottom: solid 1px rgb(0, 0, 0);
            border-top: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago_totales td.columna_pago2 {
            border-right: solid 1px rgb(0, 0, 0);
            border-bottom: solid 1px rgb(0, 0, 0);
            border-top: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago_totales td.columna_pago2.haber {
            padding-left: 130px;
            text-align: center;
        }

        #datos_pago table tbody tr.fila_pago_totales td.columna_pago2.descuento {
            text-align: right;
            padding-right: 25px;
        }

        #datos_pago table tbody tr.fila_pago_final td.columna_pago1 {
            text-align: right;
            padding-right: -55px;
            border-left: solid 1px rgb(0, 0, 0);
            border-bottom: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago_final td.columna_pago2 {
            border-right: solid 1px rgb(0, 0, 0);
            border-bottom: solid 1px rgb(0, 0, 0);
        }

        #datos_pago table tbody tr.fila_pago_final td.columna_pago2.descuento {
            text-align: right;
            padding-right: 25px;
        }

        #pie_firma {
            position: relative;
            justify-content: center;
            position: absolute;
            width: 100%;
            bottom: 25px;
        }

        #pie_firma div.recibi {
            position: absolute;
            left: 190px;
        }

        #pie_firma div.entregue {
            position: absolute;
            left: 600px;
        }

        #pie_firma span.recibi {
            position: absolute;
            left: 110px;
            top: -15px;
        }

        #pie_firma span.entregue {
            position: absolute;
            left: 535px;
            top: -15px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.7/dist/css/bootstrap.min.css') }}">
</head>

<body>
    <div id="logo_empresa">
        <div class="logo">
            <img src="{{ asset('imgs/' . $empresa->logo) }}" class="logo" alt="">
        </div>
        <div class="empresa">{{ $empresa->name }}</div>
    </div>

    <div id="titulo_doc">
        BOLETA DE PAGO
    </div>

    <div id="datos_boleta">
        <table>
            <tbody>
                <tr>
                    <td class="nombre_campo">NIT:</td>
                    <td class="campo_info">{{ $empresa->nit }}</td>
                </tr>
                <tr>
                    <td class="nombre_campo">N° PATRONAL:</td>
                    <td class="campo_info">01-945-1564</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div id="datos_personal">
        <table>
            <tbody>
                <tr>
                    <td class="nombre_campo_personal1">NOMBRE:</td>
                    <td class="campo_info1">{{ $personal->name }} {{ $personal->apep }} {{ $personal->apem }}</td>
                    <td class="nombre_campo_personal2">FECHA INGRESO:</td>
                    <td class="campo_info2">{{ date('d-m-Y', strtotime($contrato->fech_ingreso)) }}</td>
                </tr>
                <tr>
                    <td class="nombre_campo_personal1">CARGO:</td>
                    <td class="campo_info1">{{ $array_cargos[$contrato->cargos_id] }}</td>
                    <td class="nombre_campo_personal2">CÉDULA</td>
                    <td class="campo_info2">{{ $personal->ci }} {{ $personal->ci_exp }}</td>
                </tr>
                <tr>
                    <td class="nombre_campo_personal1">UNIDAD:</td>
                    <td class="campo_info1">{{ $array_areas[$contrato->unidad_areas_id] }}</td>
                    <td class="nombre_campo_personal2">NÚMERO ASEGURADO:</td>
                    <td class="campo_info2">{{ $contrato->nro_seguro }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @php
        $meses = [
            '01' => 'ENERO',
            '02' => 'FEBRERO',
            '03' => 'MARZO',
            '04' => 'ABRIL',
            '05' => 'MAYO',
            '06' => 'JUNIO',
            '07' => 'JULIO',
            '08' => 'AGOSTO',
            '09' => 'SEPTIEMBRE',
            '10' => 'OCTUBRE',
            '11' => 'NOVIEMBRE',
            '12' => 'DICIEMBRE',
        ];
    @endphp

    <div id="titulo_boleta">
        CORRESPODIENTE AL MES DE {{ $meses[$mes] }} DE {{ $anio }}
    </div>

    <div id="datos_pago">
        <table>
            <tbody>
                <tr class="titulo_pago">
                    <td colspan="2">INGRESOS</td>
                    <td colspan="2">DESCUENTOS</td>
                </tr>
                <tr class="fila_pago">
                    <td class="columna_pago1">DÍAS TRABAJADOS</td>
                    <td class="columna_pago2 haber">{{ $pago->dias_trabajado }}</td>
                    <td class="columna_pago1">AFPS {{ $afps_porcent }}%</td>
                    <td class="columna_pago2 descuento">{{ $afps }}</td>
                </tr>
                <tr class="fila_pago">
                    <td class="columna_pago1">HABER BASICO</td>
                    <td class="columna_pago2 haber">{{ number_format($contrato->salario, 2, '.', '') }}</td>
                    <td class="columna_pago1">COMISION AFP {{ $comision_afps_porcent }}%</td>
                    <td class="columna_pago2 descuento">{{ $comision_afps }}</td>
                </tr>
                <tr class="fila_pago">
                    <td class="columna_pago1">BONO ANTIGUEDAD</td>
                    <td class="columna_pago2 haber">0.00</td>
                    <td class="columna_pago1">FONDO SOLIDARIO {{ $fondo_solidario_porcent }}%</td>
                    <td class="columna_pago2 descuento">{{ $fondo_solidario }}</td>
                </tr>
                <tr class="fila_pago">
                    <td class="columna_pago1">HORAS EXTRAS</td>
                    <td class="columna_pago2 haber">{{ $total_extra_horas }}</td>
                    <td class="columna_pago1">RIESGO COMUN {{ $riesgo_comun_porcent }}%</td>
                    <td class="columna_pago2 descuento">{{ $riesgo_comun }}</td>
                </tr>
                <tr class="fila_pago">
                    <td class="columna_pago1">OTROS</td>
                    <td class="columna_pago2 haber">{{ $total_extra_otros }}</td>
                    <td class="columna_pago1">ANTICIPOS</td>
                    <td class="columna_pago2 descuento">{{ $total_descuento_anticipos }}</td>
                </tr>
                <tr class="fila_pago">
                    <td class="columna_pago1">&nbsp;</td>
                    <td class="columna_pago2"></td>
                    <td class="columna_pago1">OTROS</td>
                    <td class="columna_pago2 descuento">{{ $total_descuento_otros }}</td>
                </tr>
                <tr class="fila_pago_totales">
                    <td class="columna_pago1">TOTALES</td>
                    <td class="columna_pago2 haber">{{ $total_ingresos }}</td>
                    <td class="columna_pago1">TOTALES</td>
                    <td class="columna_pago2 descuento">{{ $total_descuentos }}</td>
                </tr>
                <tr class="fila_pago_final">
                    <td class="">&nbsp;</td>
                    <td class="">&nbsp;</td>
                    <td class="columna_pago1">LIQUIDO PAGABLE</td>
                    <td class="columna_pago2 descuento">{{ $total_liquido }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @php
        $meses_text = [
            '01' => 'enero',
            '02' => 'febrero',
            '03' => 'marzo',
            '04' => 'abril',
            '05' => 'mayo',
            '06' => 'junio',
            '07' => 'julio',
            '08' => 'agosto',
            '09' => 'septiembre',
            '10' => 'octubre',
            '11' => 'noviembre',
            '12' => 'diciembre',
        ];
        
        $fecha = 'La Paz ' . date('d') . ' de ' . $meses_text[date('m')] . ' de ' . date('Y');
    @endphp
    <table style="width:100%;margin-top:10px;">
        <tr>
            <td style="text-align:right; font-size:0.85em;">{{ $fecha }}</td>
        </tr>
    </table>

    <div id="pie_firma">
        <span class="recibi">.............................................................................</span>
        <div class="recibi">
            RECIBI CONFORME
        </div>
        <span class="entregue">.............................................................................</span>
        <div class="entregue">
            ENTREGUE CONFORME
        </div>
    </div>

    <script src="{{ asset('lib/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('js/boleta_pago.js') }}"></script>

</body>

</html>
