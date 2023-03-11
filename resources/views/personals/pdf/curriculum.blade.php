<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Curriculum personal</title>
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

  table.tabla_info{
    table-layout: fixed;
    width: 100%;
  }

  table.tabla_info thead tr th{
    font-size: 0.8em;
    word-wrap: break-word;
    padding: 5px;
    text-align: center;
  }

  table.tabla_info tbody tr td{
    word-wrap: break-word;
    padding: 5px;
    text-align: center;
  }
</style>

</head>
<body>
  <img class="logo" src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
  <div id="encabezado">
    <h2>{{$empresa->name}}</h2>
    <h4 class="titulo_pdf">CURRÍCULUM DEL PERSONAL</h4>
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
          <td class="izquierda">FECHA DE NACIMIENTO:</td>
          <td class="dato_izquierda">{{date("d/m/Y", strtotime($personal->fech_nac))}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">ESTADO CIVIL:</td>
          <td class="dato_izquierda">{{$personal->est_civil}}</td>
          <td class="vacio">&nbsp;</td>
          <td>PROFESIÓN:</td>
          <td>{{$personal->profesion}}</td>
        </tr>
        <tr>
          <td class="izquierda">NACIONALIDAD:</td>
          <td class="dato_izquierda">{{$personal->nacionalidad}}</td>
          <td class="vacio">&nbsp;</td>
          <td>GRADO ACADÉMICO ALCANZADO:</td>
          <td>{{$personal->grado_academico}}</td>
        </tr>
        <tr>
          <td class="izquierda">TELÉFONO:</td>
          <td class="dato_izquierda">{{$personal->fono}}</td>
          <td class="vacio">&nbsp;</td>
          <td>CELULAR:</td>
          <td>{{$personal->cel}}</td>
        </tr>
        <tr>
          <td class="izquierda">LUGAR DE NACIMIENTO COMPLETO:</td>
          <td colspan="4">{{$personal->lugar_nac}}</td>
        </tr>
        <tr>
          <td class="izquierda">DIRECCIÓN DE DOMICILIO COMPLETO:</td>
          <td colspan="4">{{$personal->domicilio}}</td>
        </tr>
        <tr>
          <td class="izquierda">CORREO ELECTRONICO:</td>
          <td colspan="4">{{$personal->email}}</td>
        </tr>
      </tbody>
    </table>

    <h4 class="titulo_dato">FORMACIÓN ACADÉMICA</h4>
    <table border="1" class="tabla_info">
      <thead>
        <tr>
          <th width="6.5%">NRO.</th>
          <th>UNIVERSIDAD/INSTITUCIÓN</th>
          <th>FECHA INICIO</th>
          <th>FECHA CULMINACIÓN</th>
          <th>GRADO ACADÉMICO</th>
          <th>TITULO EN PROVISIÓN NACIONAL</th>
          <th>OBSERVACIONES</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($formacions as $formacion)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $formacion->institucion }}</td>
            <td>{{ date('d-m-Y',strtotime($formacion->fech_ini)) }}</td>
            <td>{{ date('d-m-Y',strtotime($formacion->fech_culmi)) }}</td>
            <td>{{ $formacion->grado_academico }}</td>
            <td>{{ $formacion->titulo? 'SI':'NO' }}</td>
            <td>{{ $formacion->observacion }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h4 class="titulo_dato">ESPECIALIZACIONES</h4>
    <table border="1" class="tabla_info">
      <thead>
        <tr>
          <th width="6.5%">NRO.</th>
          <th>UNIVERSIDAD/INSTITUCIÓN</th>
          <th>FECHA INICIO</th>
          <th>FECHA CULMINACIÓN</th>
          <th>NOMBRE DEL CURSO</th>
          <th>DURACIÓN EN HORAS</th>
          <th>OBSERVACIONES</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($especializacions as $especializacion)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $especializacion->institucion }}</td>
            <td>{{ date('d-m-Y',strtotime($especializacion->fech_ini)) }}</td>
            <td>{{ date('d-m-Y',strtotime($especializacion->fech_culmi)) }}</td>
            <td>{{ $especializacion->nombre_curso }}</td>
            <td>{{ $especializacion->duracion}}</td>
            <td>{{ $especializacion->observacion }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <h4 class="titulo_dato">EXPERIENCIA LABORAL</h4>
    <table border="1" class="tabla_info">
      <thead>
        <tr>
          <th width="6.5%">NRO.</th>
          <th>ENTIDAD/EMPRESA</th>
          <th>FECHA INICIO</th>
          <th>FECHA CULMINACIÓN</th>
          <th>OBJETO CONTRATACIÓN</th>
          <th>CARGO</th>
          <th>SUELDO BS.</th>
          <th>OBSERVACIONES</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($experiencias as $experiencia)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $experiencia->empresa }}</td>
            <td>{{ date('d-m-Y',strtotime($experiencia->fech_ini)) }}</td>
            <td>{{ date('d-m-Y',strtotime($experiencia->fech_culmi)) }}</td>
            <td>{{ $experiencia->objeto_contratacion }}</td>
            <td>{{ $experiencia->cargo}}</td>
            <td>{{ $experiencia->sueldo }}</td>
            <td>{{ $experiencia->observacion }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>
</html>
