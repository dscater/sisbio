<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Usuarios</title>
  <style>
  @page {
    margin-top: 1cm;
    margin-bottom: 1cm;
    margin-left: 1.5cm;
    margin-right:  1.5cm;
    border: 5px solid blue;
  }

  *{
    font-family: sans-serif;
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
    width: 700px;
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

  table{
    table-layout: fixed;
    width: 100%;
    border-collapse: collapse;
  }

  table tbody tr td{
    text-align: center;
    border:solid 1px;
    word-wrap: break-word;
    font-size: 0.67em;
    padding: 7px;
  }

  table thead tr th{
    text-align: center;
    border:solid 1px;
    word-wrap: break-word;
    font-size: 0.9em;
  }

  table tbody tr td.nombres{
    text-align: left;
  }
  </style>
</head>
<body>
  <img class="logo" src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
  <div id="encabezado">
    <h2>{{$empresa->name}}</h2>
    <h4 class="titulo_pdf">PLANILLA DE EMPLEADOS</h4>
    <h4 class="fecha">Fecha: {{date('d-m-Y')}}</h4>
  </div>

  <table  border="1">
    <thead>
      <tr>
        <th width="5%">Nro.</th>
        <th width="15%">Nombre completo</th>
        <th width="15%">Cargo</th>
        <th width="15%">Unidad/Área</th>
        <th width="15%">Tipo de contrato</th>
        <th width="10%">Sueldo</th>
      </tr>
    </thead>
    <tbody>
      @php
      $c = 0;
      @endphp
      @foreach($contratos as $key => $contrato)
      <tr>
        <td>{{ $c = $key + 1 }}</td>
        <td class="nombres">{{ $contrato->personal->name }} {{ $contrato->personal->apep }} {{ $contrato->personal->apem }}</td>
        <td>{{ $array_cargos[$contrato->cargos_id] }}</td>
        <td>{{ $array_areas[$contrato->unidad_areas_id] }}</td>
        <td>{{ $contrato->tipo_contrato }}</td>
        <td>{{ $contrato->salario }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
