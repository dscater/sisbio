@extends('layouts.inicio')

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
@if(session('msg'))
  {!! session('msg') !!}
@endif
  <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Datos de usuario</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($datosUsuario,['route'=>['users.update',$datosUsuario->id],'method'=>'put','files'=>'true']) !!}
        @include('usuarios.form.form_show')
        <a href="{{ route('users.index') }}" class="btn btn-default">Volver</a>
      </div>
  </div>
@endsection
