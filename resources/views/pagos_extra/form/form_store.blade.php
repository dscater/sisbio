
<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('tipo_pago','Tipo de pago*:') }}
    {{ Form::select('tipo_pago',
    [
    '' => '- Tipo de pago -',
    'HORAS EXTRAS' => 'Horas extras',
    'OTROS' => 'Otros',
    ]
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('monto','Monto (Bs.)*:') }}
    {{ Form::text('monto',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('mes','Mes*:') }}
    {{ Form::select('mes',
      $array_mes
    ,null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  @if(isset($pagoExtra->anio))
  <div class="form-group col-md-4">
    {{ Form::label('anio','Año*:') }}
    {{ Form::select('anio',
    $array_anios
    ,null,['class'=>'form-control','required']) }}
  </div>
  @else
    <div class="form-group col-md-4">
      {{ Form::label('anio','Año*:') }}
      {{ Form::select('anio',
      $array_anios
      ,$anio_actual,['class'=>'form-control','required']) }}
    </div>
  @endif

  <div class="form-group col-md-8">
    {{ Form::label('descripcion','Descripción:') }}
    {{ Form::text('descripcion',null,['class'=>'form-control']) }}
  </div>

</div>
