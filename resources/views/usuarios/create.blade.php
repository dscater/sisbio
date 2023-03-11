@extends('layouts.inicio')

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Registrar usuario</h4>
        </div>
        <div class="panel-body">
          {!! Form::open(['route'=>'users.store','method'=>'post','files'=>'true']) !!}
          @include('usuarios.form.form_store')
          <a href="{{ route('users.index') }}" class="btn btn-default">Volver</a>
          {{ Form::submit('Registrar',['class'=>'btn btn-success']) }}
          {!! Form::close() !!}
        </div>
    </div>
@endsection
