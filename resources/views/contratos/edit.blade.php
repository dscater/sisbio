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
        <h4>Actualizar contrato de: {{$personal->name}} {{$personal->apep}} {{$personal->apem}}</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($contrato,['route'=>['contratos.update',$contrato->id],'method'=>'put','files'=>'true']) !!}
        @include('contratos.form.form_store')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('contratos.index',$contrato->personals_id) }}" class="btn btn-default">Volver</a>
          {{ Form::submit('Actualizar',['class'=>'btn btn-success']) }}
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
