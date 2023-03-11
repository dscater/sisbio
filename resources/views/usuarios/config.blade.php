@extends('layouts.inicio')

@section('css')
  <style>
  .container{
    width: 100%;
    color:rgb(0, 0, 0);
    background: rgb(236, 238, 104)!important;
    margin: auto;
  }

  .panel-body{
    flex-direction: column;
    width: 50%;
    margin: auto;
  }

  .botones{
    display: flex;
    justify-content: center;
    width: 100%;
  }

  .botones a, input[type="submit"]{
    margin: 5px;
    flex-grow: 1;
  }


  </style>
@endsection

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
@if(session('msg'))
  {!! session('msg') !!}
@endif
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4><i class="fa fa-cog"></i>Configurar datos usuario</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($user,['route'=>['users.config_update',$user->id],'method'=>'put','files'=>'true']) !!}
        @include('usuarios.form.form_config')
        {!! Form::close() !!}
      </div>
  </div>
@endsection
