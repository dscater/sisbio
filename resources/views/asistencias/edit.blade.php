@extends('layouts.inicio')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/asistencias.css') }}">
@endsection

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
@if(session('msg'))
  {!! session('msg') !!}
@endif
  <div class="panel panel-default tabla2">
      <div class="panel-heading">
        <h4>Actualizar asistencia</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($asistencia,['route'=>['asistencias.update',$asistencia->id],'method'=>'put','files'=>'true']) !!}
        @include('asistencias.form.form_update')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('asistencias.index',$asistencia->personals_id) }}" class="btn btn-default">Volver</a>
          {{ Form::submit('Actualizar',['class'=>'btn btn-success']) }}
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
@section('scripts')
  <script src="{{ asset('js/asistencias_modificar.js') }}"></script>
@endsection
