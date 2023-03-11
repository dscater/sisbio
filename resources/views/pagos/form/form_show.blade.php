<div id="contenedor_tabla">
  <h4 class="titulo_dato">DATOS GENERALES PERSONAL</h4>
  <table border="1">
    <tbody>
      <tr>
        <td class="izquierda">NOMBRE:</td>
        <td class="dato_izquierda">{{$pago->personal->name}}</td>
        <td></td>
        <td colspan="2" rowspan="5" class="imagen"><img src="{{ asset('imgs/'.$pago->personal->foto) }}" alt="foto"></td>
      </tr>
      <tr>
        <td class="izquierda">APELLIDO PATERNO:</td>
        <td class="dato_izquierda">{{$pago->personal->apep}}</td>
        <td class="vacio">&nbsp;</td>
      </tr>
      <tr>
        <td class="izquierda">APELLIDO MATERNO:</td>
        <td class="dato_izquierda">{{$pago->personal->apem}}</td>
        <td class="vacio">&nbsp;</td>
      </tr>
      <tr>
        <td class="izquierda">NÚMERO DE C.I.:</td>
        <td class="dato_izquierda">{{$pago->personal->ci}} {{$pago->personal->ci_exp}}</td>
        <td class="vacio">&nbsp;</td>
      </tr>
      <tr>
        <td class="izquierda">FECHA DE NACIMIENTO:</td>
        <td class="dato_izquierda">{{date("d/m/Y", strtotime($pago->personal->fech_nac))}}</td>
        <td class="vacio">&nbsp;</td>
      </tr>
      <tr>
        <td class="izquierda">ESTADO CIVIL:</td>
        <td class="dato_izquierda">{{$pago->personal->est_civil}}</td>
        <td class="vacio">&nbsp;</td>
        <td>PROFESIÓN:</td>
        <td>{{$pago->personal->profesion}}</td>
      </tr>
      <tr>
        <td class="izquierda">NACIONALIDAD:</td>
        <td class="dato_izquierda">{{$pago->personal->nacionalidad}}</td>
        <td class="vacio">&nbsp;</td>
        <td>GRADO ACADÉMICO ALCANZADO:</td>
        <td>{{$pago->personal->grado_academico}}</td>
      </tr>
      <tr>
        <td class="izquierda">TELÉFONO:</td>
        <td class="dato_izquierda">{{$pago->personal->fono}}</td>
        <td class="vacio">&nbsp;</td>
        <td>CELULAR:</td>
        <td>{{$pago->personal->cel}}</td>
      </tr>
    </tbody>
  </table>

  <h4 class="titulo_dato">INFORMACIÓN DEL PAGO</h4>
  <table border="1">
    <tbody>
      <tr>
        <td class="izquierda">AÑO:</td>
        <td class="dato_izquierda">{{$pago->anio}}</td>
        <td class="izquierda">MES:</td>
        <td class="dato_izquierda">{{$array_mes[$pago->mes]}}</td>
      </tr>

      <tr>
        <td class="izquierda">DÍAS TRABAJADOS:</td>
        <td class="dato_izquierda" colspan="3">{{$pago->dias_trabajado}}</td>
      </tr>

      <tr>
        <td class="izquierda">MONTO TOTAL (Bs.):</td>
        <td class="dato_izquierda" colspan="3">{{$pago->monto_total}}</td>
      </tr>

    </tbody>
  </table>
</div>
