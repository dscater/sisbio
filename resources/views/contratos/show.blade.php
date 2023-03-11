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
        <h4>Información contrato</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($contrato,['route'=>['contratos.update',$contrato->id],'method'=>'put','files'=>'true']) !!}
        @include('contratos.form.form_show')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('contratos.index',$contrato->personals_id) }}" class="btn btn-default btn-lg">Volver</a>
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
