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
    {{ Form::label('ci','C.I.*:') }}
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

  <div class="form-group col-md-2">
    {{ Form::label('genero','Género*:') }}
    {{ Form::select('genero',
    [
    '' => '- Seleccione -',
    'M' => 'Masculino',
    'F' => 'Femenino',
    ]
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-2">
    {{ Form::label('est_civil','Estado civil*:') }}
    {{ Form::select('est_civil',
    [
    '' => '- Seleccione -',
    'SOLTERO' => 'Soltero',
    'CASADO' => 'Casado',
    'DIVORCIADO' => 'Divorciado',
    'VIUDO' => 'Viudo',
    ]
    ,null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-2">
    {{ Form::label('fono','Teléfono:') }}
    {{ Form::text('fono',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group col-md-2">
    {{ Form::label('cel','Celular*:') }}
    {{ Form::text('cel',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6">
    {{ Form::label('domicilio','Domicilio*:') }}
    {{ Form::text('domicilio',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('email','Email:') }}
    {{ Form::text('email',null,['class'=>'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('foto','Foto*:') }}
    <input type="file" name="foto" value="">
  </div>

  <div class="form-group col-md-3">
    {{ Form::label('fech_nac','Fecha de nacimiento*:') }}
    {{ Form::date('fech_nac',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-5">
    {{ Form::label('lugar_nac','Lugar de nacimiento*:') }}
    {{ Form::text('lugar_nac',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('nacionalidad','Nacionalidad*:') }}
    {{ Form::text('nacionalidad',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('profesion','Profesión*:') }}
    {{ Form::text('profesion',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('grado_academico','Grado académico alcanzado*:') }}
    {{ Form::text('grado_academico',null,['class'=>'form-control','required']) }}
  </div>
</div>
