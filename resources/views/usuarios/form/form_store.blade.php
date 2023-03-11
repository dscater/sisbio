<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('name','Nombre(s)*:') }}
    {{ Form::text('name',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('apep','Apellido paterno*:') }}
    {{ Form::text('apep',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('apem','Apellido materno:') }}
    {{ Form::text('apem',null,['class'=>'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-2">
    {{ Form::label('ci','Cédula de identidad*:') }}
    {{ Form::number('ci',null,['class'=>'form-control','required']) }}
  </div>
  <div class="form-group col-md-2">
    {{ Form::label('ci_exp','Expedido*:') }}
    {{ Form::select('ci_exp',
    [
    '' => '- Seleccione -',
    'LP' => 'La Paz',
    'CB' => 'Cochabamba',
    'SC' => 'Santa Cruz',
    'OR' => 'Oruro',
    'PT' => 'Potosi',
    'CH' => 'Chuquisaca',
    'TJ' => 'Tarija',
    'BN' => 'Beni',
    'PD' => 'Pando',
    ]
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-8">
    {{ Form::label('dir','Dirección*:') }}
    {{ Form::text('dir',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('email','Correo:') }}
    {{ Form::email('email',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('fono','Teléfono*:') }}
    {{ Form::text('fono',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('cel','Celular*:') }}
    {{ Form::text('cel',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('foto','Foto*:') }}
    <input type="file" name="foto" required>
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('cargos_id','Cargo*:') }}
    {{ Form::select('cargos_id',
    $cargos_array
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('tipo_usuario','Tipo de usuario*:') }}
    {{ Form::select('tipo_usuario',
    $roles_array
    ,null,['class'=>'form-control','required']) }}
  </div>
</div>
