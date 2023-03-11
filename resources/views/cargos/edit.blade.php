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
        <h4>Actualizar cargo</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($cargo,['route'=>['cargos.update',$cargo->id],'method'=>'put']) !!}
        @include('cargos.form.form_store')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('cargos.index') }}" class="btn btn-default">Volver</a>
          {{ Form::submit('Actualizar',['class'=>'btn btn-success']) }}
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
