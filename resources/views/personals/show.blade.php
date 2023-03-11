@extends('layouts.inicio')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/tablaPersonal.css') }}">
@endsection

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
@if(session('msg'))
  {!! session('msg') !!}
@endif
  <div class="panel panel-default tabla">
      <div class="panel-heading">
        <h4>Información personal</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($personal,['route'=>['personals.update',$personal->id],'method'=>'put','files'=>'true']) !!}
        @include('personals.form.form_show')
        {!! Form::close() !!}
        <div id="boton_volver">
          <a href="{{ route('personals.index') }}" class="btn btn-default btn-lg">Volver</a>
        </div>
      </div>
  </div>
@endsection
