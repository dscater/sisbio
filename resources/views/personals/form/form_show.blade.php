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
    </tbody>
  </table>

  <h4 class="titulo_dato">LUGAR DE NACIMIENTO</h4>
  <table border="1">
    <tbody>
      <tr>
        <td class="izquierda">LUGAR DE NACIMIENTO COMPLETO:</td>
        <td class="dato_izquierda">{{$personal->lugar_nac}}</td>
      </tr>
    </tbody>
  </table>

  <h4 class="titulo_dato">DOMICILIO ACTUAL</h4>
  <table border="1">
    <tbody>
      <tr>
        <td class="izquierda">DIRECCIÓN DE DOMICILIO COMPLETO:</td>
        <td class="dato_izquierda">{{$personal->domicilio}}</td>
      </tr>
      <tr>
        <td class="izquierda">CORREO ELECTRONICO:</td>
        <td class="dato_izquierda">{{$personal->email}}</td>
      </tr>
    </tbody>
  </table>
</div>
