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
</style>

</head>
<body>
  <img class="logo" src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
  <div id="encabezado">
    <h2>{{$empresa->name}}</h2>
    <h4 class="titulo_pdf">CONTRATO PERSONAL</h4>
    <h4>Fecha: {{date('d-m-Y')}}</h4>
  </div>

  <div id="contenedor_tabla">
    <h4 class="titulo_dato">DATOS GENERALES</h4>
    <table border="1">
      <tbody>
        <tr>
          <td class="izquierda">NOMBRE:</td>
          <td class="dato_izquierda">{{$contrato->personal->name}}</td>
          <td></td>
          <td colspan="2" rowspan="5" class="imagen"><img src="{{ asset('imgs/'.$contrato->personal->foto) }}" alt="foto"></td>
        </tr>
        <tr>
          <td class="izquierda">APELLIDO PATERNO:</td>
          <td class="dato_izquierda">{{$contrato->personal->apep}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">APELLIDO MATERNO:</td>
          <td class="dato_izquierda">{{$contrato->personal->apem}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">NÚMERO DE C.I.:</td>
          <td class="dato_izquierda">{{$contrato->personal->ci}} {{$contrato->personal->ci_exp}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">FECHA DE INGRESO:</td>
          <td class="dato_izquierda">{{date("d/m/Y", strtotime($contrato->fech_ingreso))}}</td>
          <td class="vacio">&nbsp;</td>
        </tr>
        <tr>
          <td class="izquierda">FECHA RETIRO:</td>
          <td class="dato_izquierda">{{date("d/m/Y", strtotime($contrato->fech_retiro))}}</td>
          <td class="vacio">&nbsp;</td>
          <td>NIT PERSONAL:</td>
          <td>{{$contrato->nit_personal}}</td>
        </tr>
        <tr>
          <td class="izquierda">FORMA PAGO:</td>
          <td class="dato_izquierda">{{$contrato->forma_pago}}</td>
          <td class="vacio">&nbsp;</td>
          <td>TURNO:</td>
          <td>{{$contrato->turno}}</td>
        </tr>
        <tr>
          <td class="izquierda">SALARIO (Bs.):</td>
          <td class="dato_izquierda">{{$contrato->salario}}</td>
          <td class="vacio">&nbsp;</td>
          <td>TIPO CONTRATO:</td>
          <td>{{$contrato->tipo_contrato}}</td>
        </tr>
        <tr>
          <td class="izquierda">ESTADO:</td>
          <td colspan="4">{{$contrato->estado}}</td>
        </tr>
      </tbody>
    </table>

    <h4 class="titulo_dato">CARGO Y UNIDAD/ÁREA</h4>
    <table border="1">
      <tbody>
        <tr>
          <td class="izquierda">CARGO:</td>
          <td class="dato_izquierda">{{$contrato->cargo->name}}</td>
        </tr>
        <tr>
          <td class="izquierda">UNIDAD/ÁREA:</td>
          <td class="dato_izquierda">{{$contrato->area->name}}</td>
        </tr>
      </tbody>
    </table>

    <h4 class="titulo_dato">SEGURO Y BANCO</h4>
    <table border="1">
      <tbody>
        <tr>
          <td class="izquierda">NÚMERO DE SEGURO DE SALUD:</td>
          <td class="dato_izquierda">{{$contrato->nro_seguro}}</td>
        </tr>
        <tr>
          <td class="izquierda">NÚMERO DE CUENTA DE BANCO:</td>
          <td class="dato_izquierda">{{$contrato->nro_cuenta}}</td>
        </tr>
        <tr>
          <td class="izquierda">NOMBRE DE BANCO REMUNERACIÓN:</td>
          <td class="dato_izquierda">{{$contrato->nombre_banco}}</td>
        </tr>
      </tbody>
    </table>
  </div>

</body>
</html>
