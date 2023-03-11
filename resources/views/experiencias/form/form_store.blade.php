
<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('empresa','Empresa*:') }}
    {{ Form::text('empresa',null,['class'=>'form-control','required']) }}
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
    {{ Form::label('objeto_contratacion','Objeto de contratación*:') }}
    {{ Form::text('objeto_contratacion',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('cargo','Cargo*:') }}
    {{ Form::text('cargo',null,['class'=>'form-control','required']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('sueldo','Sueldo*:') }}
    {{ Form::text('sueldo',null,['class'=>'form-control','required']) }}
  </div>
</div>
