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
    font-size: 0.9em;
    padding: 2px;
  }

  table thead tr th{
    text-align: center;
    border:solid 1px;
    word-wrap: break-word;
  }
  </style>
</head>
<body>
  <img class="logo" src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
  <div id="encabezado">
    <h2>{{$empresa->name}}</h2>
    <h4 class="titulo_pdf">LISTA DE USUARIOS</h4>
    <h4>Fecha: {{date('d-m-Y')}}</h4>
  </div>

  <table  border="1">
    <thead>
      <tr>
        <th width="5%">Nro.</th>
        <th width="8%">Código Usuario</th>
        <th width="10%">Nombre</th>
        <th width="10%">Apellido paterno</th>
        <th width="10%">Apellido materno</th>
        <th width="20%">Dirección</th>
        <th width="15%">Email</th>
        <th width="7.5%">Teléfono Celular</th>
        <th width="7.5%">Tipo de usuario</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datos_users as $dato_user)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $dato_user->user->name }}</td>
          <td>{{ $dato_user->name }}</td>
          <td>{{ $dato_user->apep }}</td>
          <td>{{ $dato_user->apem }}</td>
          <td>{{ $dato_user->dir }}</td>
          <td>{{ strtolower($dato_user->email) }}</td>
          <td>{{ $dato_user->fono }}</td>
          <td>{{ $dato_user->user->roles->first()->name }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
