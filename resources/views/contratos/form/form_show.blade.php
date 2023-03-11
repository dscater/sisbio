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
