<div class="container col-md-12">
  <div class="row col-md-12">
    <h3><i class="fa fa-edit"></i>Cambiar nombre de usuario:</h3>
  </div>
  <div class="row col-md-12">
    <div class="form-group col-md-12">
      {{ Form::label('name','Nombre de usuario*') }}
      {{ Form::text('name',null,['class'=>'form-control']) }}
      @if($errors->has('name'))
      <strong style="color:rgb(190, 48, 23)">{{$errors->first('name')}}</strong>
      @endif
    </div>
  </div>

  <div class="row col-md-12">
    <h3><i class="fa fa-edit"></i>Cambiar contraseña:</h3>
  </div>

  <div class="row col-md-12">
    <div class="form-group col-md-12">
      {{ Form::label('old_password','Contraseña actual*') }}
      {{ Form::password('old_password',['class'=>'form-control']) }}
      <strong style="color:rgb(190, 48, 23)">@if(session('pass')){!! session('pass') !!}@endif</strong>
    </div>

    <div class="form-group col-md-12">
      {{ Form::label('new_password','Nueva contraseña*') }}
      {{ Form::password('new_password',['class'=>'form-control']) }}
      <strong style="color:rgb(190, 48, 23)">@if(session('pass_new')){!! session('pass_new') !!}@endif</strong>
    </div>
  </div>

  <div class="botones">
    <a href="{{ route('home') }}" class="btn btn-default"><i class="fa fa-home"></i> Inicio</a>
    {{ Form::submit('Actualizar',['class'=>'btn btn-success']) }}
  </div>
</div>
