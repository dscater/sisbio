<div class="row">
  <div class="foto" id="contenedor_foto">
    <img src="{{ asset('imgs/'.$personal->foto) }}" alt="" width="150px" height="150px">
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('name','Nombre(s)*:') }}
    {{ Form::text('name',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('apep','Apellido paterno*:') }}
    {{ Form::text('apep',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('apem','Apellido materno:') }}
    {{ Form::text('apem',null,['class'=>'form-control','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-2">
    {{ Form::label('ci','C.I.*:') }}
    {{ Form::text('ci',$personal->ci.' '.$personal->ci_exp,['class'=>'form-control','required','readonly']) }}
  </div>
  <div class="form-group col-md-2">
    {{ Form::label('genero','Género*:') }}
    @if($personal->genero == 'M')
      {{ Form::text('genero','MASCULINO',['class'=>'form-control','required','readonly']) }}
    @else
      {{ Form::text('genero','FEMENINO',['class'=>'form-control','required','readonly']) }}
    @endif
  </div>

  <div class="form-group col-md-2">
    {{ Form::label('est_civil','Estado civil*:') }}
    {{ Form::text('est_civil',$personal->est_civil,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-2">
    {{ Form::label('fono','Teléfono:') }}
    {{ Form::text('fono',null,['class'=>'form-control','readonly']) }}
  </div>

  <div class="form-group col-md-2">
    {{ Form::label('cel','Celular*:') }}
    {{ Form::text('cel',null,['class'=>'form-control','required','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6">
    {{ Form::label('domicilio','Domicilio*:') }}
    {{ Form::text('domicilio',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('email','Email:') }}
    {{ Form::text('email',null,['class'=>'form-control','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-3">
    {{ Form::label('fech_nac','Fecha de nacimiento*:') }}
    {{ Form::date('fech_nac',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-5">
    {{ Form::label('lugar_nac','Lugar de nacimiento*:') }}
    {{ Form::text('lugar_nac',null,['class'=>'form-control','required','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('nacionalidad','Nacionalidad*:') }}
    {{ Form::text('nacionalidad',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('profesion','Profesión*:') }}
    {{ Form::text('profesion',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('grado_academico','Grado académico alcanzado*:') }}
    {{ Form::text('grado_academico',null,['class'=>'form-control','required','readonly']) }}
  </div>
</div>
