
<div class="row">
  <div class="form-group col-md-4 col-md-offset-2 col-xs-6">
    {{ Form::label('mes','Mes*:') }}
    {{ Form::select('mes',
      $array_mes
    ,null,['class'=>'form-control','required','id'=>'select_mes']) }}
  </div>
  <div class="form-group col-md-4 col-xs-6">
    {{ Form::label('anio','Año*:') }}
    {{ Form::select('anio',
    $array_anios
    ,$anio_actual,['class'=>'form-control','required','id'=>'select_anio']) }}
  </div>
</div>
