<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pdf Personal</title>
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
    width: 100%;
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

  table tbody tr td, thead tr th{
    text-align: center;
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
  }</style>

</head>
<body>
  <img class="logo" src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
  <div id="encabezado">
    <h2>{{$empresa->name}}</h2>
    <h4 class="titulo_pdf">PAGOS EXTRA DE PERSONAL</h4>
    <h4>Fecha: {{date('d-m-Y')}}</h4>
  </div>

  <div id="contenedor_tabla">
    <p>Pagos extra de: <strong>{{$personal->name}} {{$personal->apep}} {{$personal->apem}}</strong></p>
    <table border="1">
      <thead>
        <tr>
          <th width="50px">Nro.</th>
          <th>Tipo de pago</th>
          <th>Monto Bs.</th>
          <th>Mes</th>
          <th>Año</th>
          <th>Fecha Pago</th>
          <th>Descripción</th>
        </tr>
      </thead>
      <tbody>
        <div style="display:none">{{$i=1}}</div>
        @if($pagosExtras)
        @foreach($pagosExtras as $pagoExtra)
          <tr>
            <td>{{$i++}}</td>
            <td>{{ $pagoExtra->tipo_pago }}</td>
            <td>{{ $pagoExtra->monto }}</td>
            <td>{{ $pagoExtra->mes }}</td>
            <td>{{ $pagoExtra->anio }}</td>
            <td>{{ date('d-m-Y',strtotime($pagoExtra->fech_pago)) }}</td>
            <td>{{ $pagoExtra->descripcion?:'(Sin descripción)' }}</td>
          </tr>
        @endforeach
        @else
        <tr><td colspan="100px">No se encontro ningún registro</td></tr>
        @endif
      </tbody>
    </table>
  </div>

</body>
</html>
