<div class="row">
  <div class="foto" id="contenedor_foto">
    <img src="{{ asset('imgs/'.$datosUsuario->foto) }}" alt="" width="150px" height="150px">
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
  <div class="form-group col-md-4">
    {{ Form::label('ci','Cédula de identidad*:') }}
    {{ Form::text('ci',$datosUsuario->ci.' '.$datosUsuario->ci_exp,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-8">
    {{ Form::label('dir','Dirección*:') }}
    {{ Form::text('dir',null,['class'=>'form-control','required','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('email','Correo:') }}
    {{ Form::email('email',null,['class'=>'form-control','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('fono','Teléfono*:') }}
    {{ Form::text('fono',null,['class'=>'form-control','required','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('cel','Celular*:') }}
    {{ Form::text('cel',null,['class'=>'form-control','required','readonly']) }}
  </div>
</div>

<div class="row">
  <div class="form-group col-md-4">
    {{ Form::label('cargos_id','Cargo*:') }}
    {{ Form::text('cargos_id',$datosUsuario->cargo->name,['class'=>'form-control','readonly']) }}
  </div>

  <div class="form-group col-md-4">
    {{ Form::label('tipo_usuario','Tipo de usuario*:') }}
    {{ Form::text('tipo_usuario',$datosUsuario->user->roles->first()->name,['class'=>'form-control','readonly']) }}
  </div>
</div>
