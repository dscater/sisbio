<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Historia pagos</title>
  <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.7/dist/css/bootstrap.min.css')}}">
  <style>
  body{
    position: relative;
  }

  #encabezado{
    width: 100%;
  }

  img.logo{
    width: 200px;
    height: 160px;
    position: absolute;
    top:-40px;
    left: -50px;
  }

  #encabezado > h2{
    font-size: 1.8em;
    position: relative;
    top:15px;
    text-align: center;
    font-family: sans-serif;
    width: 340px;
    margin:auto;
  }

  #encabezado > h4.titulo_pdf{
    margin-top: 35px;
  }

  #encabezado > h4{
    font-size: 1.2em;
    text-align: center;
    font-family: sans-serif;
  }

  #contenedor_tabla{
    width: 650px;
    margin: auto;
  }
  #contenedor_tabla h4.titulo_dato{
    font-family: sans-serif;
    color:rgb(0, 0, 0);
  }

  #boton_volver{
    display: flex;
    width: 100%;
    margin: auto;
  }

  #boton_volver a{
    margin-top: 25px;
  }

  table{
   width: 100%;
  }

  table tbody tr td{
    font-family: sans-serif;
    font-size: 0.8em;
    padding: 1.5px;
  }

  table tbody tr td.izquierda{
    width: 30%;
    text-align: right;
  }

  table tbody tr td.dato_izquierda{
    width: 28%;
    text-align: left;
  }

  table tbody tr td.vacio{
    width: 5%;
  }

  table tbody tr td.imagen{
    padding: 0;
  }

  table tbody tr td.imagen img{
    width: 211px;
    height: 164px;
    margin-left: 14.5px;
  }

  @page {
    margin-top: 1cm;
    margin-bottom: 1cm;
    margin-left: 1.5cm;
    margin-right:  1.5cm;
    border: 5px solid blue;
  }

  h4.titulo_dato2{
    font-family: sans-serif;
    text-align: center;
  }

  table#tabla_pagos{
    text-align: center;
  }

  table#tabla_pagos thead tr th{
    text-align: center;
  }

  table#tabla_pagos tbody tr td.total{
    text-align: right;
  }

</style>

</head>
<body>
  <img class="logo" src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
  <div id="encabezado">
    <h2>{{$empresa->name}}</h2>
    <h4 class="titulo_pdf">HISTORIA DE PAGOS DEL PERSONAL</h4>
    <h4>Fecha: {{date('d-m-Y')}}</h4>
  </div>

  <div id="contenedor_tabla">
    <h4 class="titulo_dato">DATOS PERSONALES</h4>
    <table border="1">
      <tbody>
        <tr>
          <td class="izquierda">NOMBRE:</td>
          <td class="dato_izquierda">{{$personal->name}}</td>
          <td></td>
          <td colspan="2" rowspan="5" class="imagen"><img src="{{ asset('imgs/'.$personal->foto) }}" alt="foto"></td>
        </tr>
        <tr>
          <td class="izquierda">APELLIDO PATERNO:</td>
          <td class="dato_izquierda">{{$personal->apep}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">APELLIDO MATERNO:</td>
          <td class="dato_izquierda">{{$personal->apem}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">NÚMERO DE C.I.:</td>
          <td class="dato_izquierda">{{$personal->ci}} {{$personal->ci_exp}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">PROFESIÓN:</td>
          <td class="dato_izquierda">{{$personal->profesion}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">CELULAR:</td>
          <td class="dato_izquierda">{{$personal->cel}}</td>
          <td class="vacio">&nbsp;</td>
          <td>FECHA DE INGRESO:</td>
          <td>{{ date('d-m-Y',strtotime($contrato->fech_ingreso)) }}</td>
        </tr>
      </tbody>
    </table>

    <h4 class="titulo_dato2">DETALLE DE PAGOS </h4>
    <table border="1" id="tabla_pagos">
      <thead>
        <tr>
          <th>NRO.</th>
          <th>FECHA PAGO</th>
          <th>CORRESPONDIENTE AL MES</th>
          <th>LIQUIDO PAGABLE</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
          $suma_total = 0;
        @endphp
        @foreach($pagos_personal as $pago_personal)
        {{ $suma_total = $suma_total + $pago_personal->monto_total }}
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ date('d-m-Y',strtotime($pago_personal->created_at)) }}</td>
            <td>{{ $array_mes[$pago_personal->mes] }}</td>
            <td>{{ $pago_personal->monto_total }}</td>
          </tr>
        @endforeach
        <tr>
          <td colspan="3" class="total">TOTAL</td>
          <td>{{ $suma_total }}</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>
</html>
