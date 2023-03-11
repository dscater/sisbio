
<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('fech_ingreso','Fecha ingreso*:') }}
    {{ Form::date('fech_ingreso',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('fech_retiro','Fecha retiro*:') }}
    {{ Form::date('fech_retiro',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('forma_pago','Forma pago*:') }}
    {{ Form::text('forma_pago',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('salario','Salario (en Bolivianos)*:') }}
    {{ Form::text('salario',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('unidad_areas_id','Unidad/Área*:') }}
    {{ Form::select('unidad_areas_id',
    $array_area
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('cargos_id','Cargo*:') }}
    {{ Form::select('cargos_id',
    $array_cargo
    ,null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('tipo_contrato','Tipo contrato*:') }}
    {{ Form::select('tipo_contrato',
    [
    '' => '- Seleccione una opción -',
    'DE PLANTA' => 'DE PLANTA',
    'POR CONTRATO' => 'POR CONTRATO',
    'EVENTUAL' => 'EVENTUAL',
    ]
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('turno','Turno*:') }}
    {{ Form::select('turno',
    [
    '' => '- Seleccione una opción -',
    'MAÑANA' => 'Mañana',
    'TARDE' => 'Tarde',
    'NOCHE' => 'Noche',
    'JORNADA ORDINARIA' => 'Jornada ordinaria',
    ]
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('nit_personal','Nit del personal*:') }}
    {{ Form::text('nit_personal',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('nro_seguro','Número de seguro de salud*:') }}
    {{ Form::text('nro_seguro',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('nro_cuenta','Número de cuenta de banco:') }}
    {{ Form::text('nro_cuenta',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('nombre_banco','Nombre de Banco Remuneración:') }}
    {{ Form::text('nombre_banco',null,['class'=>'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-12">
    {{ Form::label('observacion','Observaciones:') }}
    {{ Form::text('observacion',null,['class'=>'form-control']) }}
  </div>
</div>
