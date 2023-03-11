<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Planilla de sueldos</title>
  <style>
  *{
    font-family: sans-serif;
  }

  @page {
    margin-top: 2cm;
    margin-bottom: 1cm;
    margin-left: 0.5cm;
    margin-right:  0.5cm;
    border: 5px solid blue;
  }

  *{
    font-family: sans-serif;
  }


  h4.area{
    font-family: sans-serif;
    text-align: center;
  }

  table{
    table-layout: fixed;
    width: 100%;
  }

  table tbody tr td{
    text-align: center;
    border:solid 1px;
    word-wrap: break-word;
    font-size: 0.7em;
    padding: 2px;
  }

  table thead tr th{
    font-size: 0.7em;
    text-align: center;
    border:solid 1px;
    word-wrap: break-word;
  }

  #contenedor_info{
    width: 100%;
    height: 55px;
  }

  #informacion1{
    display: inline-block;
    width: 70%;
  }

  #informacion2{
    display: inline-block;
    width: 30%;
  }

  #informacion1 div{
    width: 100%;
  }
  #informacion2 div{
    width: 100%;
  }

  #informacion1 span{
    margin: 3px;
    display: inline-block;
    padding: 4px;
  }

  #informacion2 span{
    margin: 3px;
    display: inline-block;
    padding: 4px;
  }

  #informacion2 span.span_{
    margin-right: 68px;
  }

  #informacion1 span.span1{
    display: inline-block;
    position: relative;
    border:solid 1px rgb(0, 0, 0);
    width: 71.2%;
    margin-left: 5px;
  }

  #informacion1 span.span2{
    display: inline-block;
    position: relative;
    border:solid 1px rgb(0, 0, 0);
    width: 35%;
    padding: 4px;
    margin-left: 5px;
  }

  #informacion2 span.span3{
    display: inline-block;
    border:solid 1px rgb(0, 0, 0);
    width: 50%;
    padding: 3px;
    margin-left: 5px;
  }

  #informacion2 span.span4{
    display: inline-block;
    border:solid 1px rgb(0, 0, 0);
    width: 50%;
    padding: 3px;
    margin-left: 5px;
  }

  #encabezado{
    padding-top: 0;
    width: 100%;
  }

  #encabezado > h2{
    font-size: 1.8em;
    position: relative;
    text-align: center;
    font-family: sans-serif;
  }

  #encabezado > h4.titulo_pdf{
  }

  #encabezado > h4{
    font-size: 1.2em;
    text-align: center;
    font-family: sans-serif;
  }

  #pie{
    position: absolute;
    width: 100%;
    font-size: 0.7em;
    display: block;
    bottom: 10px;
  }

  #pie div.nombre_empleador{
    width: 280px;
    left: 60px;
    display: inline-block;
    position: absolute;
  }

  #pie div.nro_documento{
    width: 210px;
    left: 460px;
    display: inline-block;
    position: absolute;
  }

  #pie div.firma{
    width: 150px;
    left: 800px;
    display: inline-block;
    position: absolute;
  }

  #pie div.fecha{
    width: 90px;
    left: 1060px;
    display: inline-block;
    position: absolute;
  }

  #pie div.nombre_empleador p{
    display: block;
    text-align: center;
    width: 100%;
  }

  #pie div.nro_documento p{
    display: block;
    text-align: center;
    width: 100%;
  }

  #pie div.firma p{
    display: block;
    text-align: center;
    width: 100%;
  }

  #pie div.fecha p{
    display: block;
    text-align: center;
    width: 100%;
  }

  #pie div.fecha span{
    display: block;
    width: 100%;
    text-align: center;
  }
  </style>
  <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.7/dist/css/bootstrap.min.css')}}">
</head>
<body>
  <div id="contenedor_info">
    <div id="informacion1">
      <div><span>NOMBRE O RAZÓN SOCIAL</span> <span class="span1">{{$empresa->name}}</span></div>
      <div><span>N° IDENTIFICADOR DEL EMPLEADOR ANTE EL MINISTERIO DE TRABAJO</span> <span class="span2">{{$empresa->nro_autorizacion}}</span></div>
    </div>
    <div id="informacion2">
      <div><span class="span_">N° DE NIT</span> <span class="span3">{{$empresa->nit}}</span></div>
      <div><span>N° DE EMPLEADOR</span> <span class="span4">{{$empresa->nro_empleador}}</span></div>
    </div>
  </div>

  <div id="encabezado">
    <h2>PLANILLA DE SUELDOS Y SALARIOS</h2>
    <h4 class="titulo_pdf">(En Bolivianos)</h4>
    <h4>CORRESPONDIENTE AL MES DE {{$array_mes_pdf[$valor_mes]}} DE {{$valor_anio}}</h4>
  </div>

  @if($sw == 1)
  @include('reportes.parcials.sw_planilla1')
  @endif

  @if($sw==2)
  @include('reportes.parcials.sw_planilla2')
  @endif

  @if($sw==3)
  @include('reportes.parcials.sw_planilla3')
  @endif

  @if($sw==4)
  @include('reportes.parcials.sw_planilla4')
  @endif

  @if($sw == 5)
  @include('reportes.parcials.sw_planilla5')
  @endif

  @if($sw==6)
  @include('reportes.parcials.sw_planilla6')
  @endif

  @if($sw==7)
  @include('reportes.parcials.sw_planilla7')
  @endif

  @if($sw==8)
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
      <span>{{date('d-m-Y')}}</span>
      <p>FECHA</p>
    </div>
  </div>
</body>
</html>
