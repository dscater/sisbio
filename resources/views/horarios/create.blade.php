@extends('layouts.inicio')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/hora.css') }}">
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
          <h4>Configurar horario del área/unidad: {{$area->name}}</h4>
        </div>
        <div class="panel-body">
          {!! Form::open(['route'=>['horarios.store',$area->id],'method'=>'post','files'=>'true']) !!}
          @include('horarios.form.form_store')
          <div class="form-group col-md-6 col-md-offset-5">
            <a href="{{ route('horarios.index') }}" class="btn btn-default">Volver</a>
            {{ Form::submit('Registrar',['class'=>'btn btn-success']) }}
          </div>
          {!! Form::close() !!}
        </div>
    </div>
@endsection
