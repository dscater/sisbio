<table  border="1">
  <thead>
    <tr>
      <th width="2%">Nro.</th>
      <th width="6%">Documento de Identidad</th>
      <th width="10%">Apellidos y Nombre</th>
      <th width="5%">País de nacionalidad</th>
      <th width="">Fecha de nacimiento</th>
      <th width="">Sexo (M/F)</th>
      <th width="">Ocupación que desempeña</th>
      <th width="">Fecha de ingreso</th>
      <th width="">Horas pagadas (Día)</th>
      <th width="">Días pagados (Mes)</th>
      <th width="">(1) Haber básico</th>
      <th width="">(2) Bono de antiguedad</th>
      <th width="">(3) Trabajo extra ordinario y nocturno</th>
      <th width="">(4) Otros bonos</th>
      <th width="">(5) TOTAL GANADO suma de (1 a 4)</th>
      <th width="">(6) Aporte a las AFPS</th>
      <th width="">(7) Comisión AFP</th>
      <th width="">(8) Fondo solidario</th>
      <th width="">(9) Riesgo común</th>
      <th width="">(10) Anticipos</th>
      <th width="">(11) Otros descuentos</th>
      <th width="">(12) TOTAL DESCUENTOS</th>
      <th width="">(13) LÍQUIDO PAGABLE (5-12)</th>
      <th width="8%">(14) Firma</th>
    </tr>
  </thead>
  <tbody>
    @php
    $i = 1 ;
    $contador = 0;
    @endphp
    @foreach($personal_area as $personalarea)
    @if($array_pagos[$personalarea->id] != "0")
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{ $personalarea->ci }} {{ $personalarea->ci_exp }}</td>
        <td>{{ $personalarea->apep }} {{ $personalarea->apem }} {{ $personalarea->name }}</td>
        <td>{{ $personalarea->nacionalidad }}</td>
        <td>{{ $personalarea->fech_nac }}</td>
        <td>{{ $personalarea->genero }}</td>
        <td>{{ $array_cargos[$personalarea->cargos_id] }}</td>
        <td>{{ $personalarea->fech_ingreso }}</td>
        <td>8</td>
        <td>{{$array_pagos[$personalarea->id] }}</td>
        <td>{{ $personalarea->salario }}</td>
        <td>0.00</td>
        <td>{{ $total_extra_horas[$personalarea->id] }}</td>
        <td>{{ $total_extra_otros[$personalarea->id] }}</td>
        <td>{{ $total_ingresos[$personalarea->id] }}</td>
        <td>{{ $valor_afps[$personalarea->id] }}</td>
        <td>{{ $valor_comision[$personalarea->id] }}</td>
        <td>{{ $valor_fondo[$personalarea->id] }}</td>
        <td>{{ $valor_riesgo[$personalarea->id] }}</td>
        <td>{{ $total_descuento_anticipos[$personalarea->id] }}</td>
        <td>{{ $total_descuento_otros[$personalarea->id] }}</td>
        <td>{{ $total_descuentos[$personalarea->id] }}</td>
        <td>{{ $total_liquido[$personalarea->id] }}</td>
        <td></td>
      </tr>
      @php  
      $contador++;
      @endphp
    @endif
    @endforeach
    @if($contador == 0)
    <tr>
      <td colspan="24">NO SE ENCONTRARON REGISTROS</td>
    </tr>
    @endif
  </tbody>
</table>
