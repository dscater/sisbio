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
        <h4>Actualizar especialización</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($experiencia,['route'=>['experiencias.update',$experiencia->id],'method'=>'put','files'=>'true']) !!}
        @include('experiencias.form.form_store')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('experiencias.index',$experiencia->personals_id) }}" class="btn btn-default">Volver</a>
          {{ Form::submit('Actualizar',['class'=>'btn btn-success']) }}
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
