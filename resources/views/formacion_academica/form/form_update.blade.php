
<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('institucion','Universidad / Institución*:') }}
    {{ Form::text('institucion',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('fech_ini','Fecha inicio*:') }}
    {{ Form::date('fech_ini',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('fech_culmi','Fecha culminación:') }}
    {{ Form::date('fech_culmi',null,['class'=>'form-control']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('grado_academico','Grado académico alcanzado*:') }}
    {{ Form::text('grado_academico',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('titulo','Título en provisión nacional:') }}
    <input type="file" name="titulo" value="">
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('codigo_titulo','Código de título*:') }}
    {{ Form::text('codigo_titulo',null,['class'=>'form-control','required']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-12">
    {{ Form::label('observacion','Observaciones:') }}
    {{ Form::text('observacion',null,['class'=>'form-control']) }}
  </div>
</div>
