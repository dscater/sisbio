<div class="row">
  <div class="form-group col-md-4 col-xs-4 flotante">
    <img src="{{ asset('imgs/'.$personal->foto) }}" alt="">
  </div>
  <div class="form-group col-md-4 col-xs-4">
    {{ Form::label('name','Personal:') }}
    {{ Form::text('name',$personal->name.' '.$personal->apep.' '.$personal->apem,['class'=>'form-control','readonly']) }}
  </div>

  <div class="form-group col-md-4 col-xs-4">
    {{ Form::label('ci','Número de c.i.:') }}
    {{ Form::text('ci',$personal->ci,['class'=>'form-control','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4 col-xs-4">
    {{ Form::label('cargo','Cargo:') }}
    {{ Form::text('cargo',$contrato->cargo->name,['class'=>'form-control','readonly']) }}
  </div>

  <div class="form-group col-md-4 col-xs-4">
    {{ Form::label('fech_ingreso','Fecha ingreso:') }}
    {{ Form::text('cargo',date('d-m-Y',strtotime($contrato->fech_ingreso)),['class'=>'form-control','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4 col-xs-4">
    {{ Form::label('area','Unidad/Área:') }}
    {{ Form::text('area',$contrato->area->name,['class'=>'form-control','readonly']) }}
  </div>

  <div class="form-group col-md-4 col-xs-4">
    {{ Form::label('seguro','Número de seguro:') }}
    {{ Form::text('seguro',$contrato->nro_seguro,['class'=>'form-control','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <table border="3">
      <thead>
        <tr>
          <th colspan="2">INGRESOS</th>
          <th colspan="2">DESCUENTOS</th>
        </tr>
      </thead>
      <tbody>
        <tr class="fila_1">
          <td>DÍAS TRABAJADOS</td>
          <td><input type="text" class="form-control" name="dias_trabajado" value="" id="dias_trabajados"></td>
          <td>AFPS {{$afps->valor * 100}}%</td>
          <td><input type="text" class="form-control" value="{{$afps->valor}}"  id="afps" readonly></td>
        </tr>
        <tr class="fila_2">
          <td>HABER BÁSICO</td>
          <td><input type="text" class="form-control" value="{{ number_format($contrato->salario,2,'.','') }}" id="salario" readonly></td>
          <td>COMISIÓN AFP {{$comision_afps->valor * 100}}%</td>
          <td><input type="text" class="form-control" value="{{$comision_afps->valor}}" id="comision_afp" readonly></td>
        </tr>
        <tr class="fila_1">
          <td>BONO DE ANTIGUEDAD</td>
          <td><input type="text" class="form-control" value="0.00" readonly></td>
          <td>FONDO SOLIDARIO {{$fondo_solidario->valor * 100}}%</td>
          <td><input type="text" class="form-control" value="{{$fondo_solidario->valor}}"  id="fondo_solidario" readonly></td>
        </tr>
        <tr class="fila_2">
          <td>HORAS EXTRAS</td>
          <td><input type="text" class="form-control" value="" id="horas_extra" readonly></td>
          <td>RIESGO COMUN {{$riesgo_comun->valor * 100}}%</td>
          <td><input type="text" class="form-control" value="{{$riesgo_comun->valor}}"  id="riesgo_comun" readonly></td>
        </tr>
        <tr class="fila_1">
          <td>OTROS</td>
          <td><input type="text" class="form-control" value="" id="pagos_otros" readonly></td>
          <td>ANTICIPOS</td>
          <td><input type="text" class="form-control" value="" id="anticipos" readonly></td>
        </tr>
        <tr class="fila_2">
          <td></td>
          <td></td>
          <td>OTROS</td>
          <td><input type="text" class="form-control" value="" id="descuentos_otros" readonly></td>
        </tr>
        <tr class="total">
          <td>TOTAL (Bs.)</td>
          <td><input type="text" class="form-control" value="" id="total_pagos" readonly></td>
          <td>TOTAL (Bs.)</td>
          <td><input type="text" class="form-control" value="" id="total_descuentos" readonly></td>
        </tr>
        <tr class="total_final">
          <td colspan="2">TOTAL LIQUIDO PAGABLE (Bs.)</td>
          <td><input type="text" class="form-control" value="" name="monto_total" id="total_total" readonly></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
