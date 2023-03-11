
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
    {{ Form::label('nombre_curso','Nombre del curso*:') }}
    {{ Form::text('nombre_curso',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('duracion','Duración en horas:') }}
    {{ Form::number('duracion',null,['class'=>'form-control']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('archivo','Archivo*:') }}
    <input type="file" name="archivo" value="">
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('codigo_archivo','Código*:') }}
    {{ Form::text('codigo_archivo',null,['class'=>'form-control','required']) }}
  </div>
  <div class="form-group col-md-8">
    {{ Form::label('observacion','Observaciones:') }}
    {{ Form::text('observacion',null,['class'=>'form-control']) }}
  </div>
</div>
