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
        <h4>Información personal</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($personal,['route'=>['personals.update',$personal->id],'method'=>'put','files'=>'true']) !!}
        @include('personals.form.form_show')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('personals.index') }}" class="btn btn-default">Volver</a>
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
