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
          <h4>Registrar asistencia</h4>
        </div>
        <div class="panel-body">
          {!! Form::open(['route'=>['asistencias.store',$id],'method'=>'post','files'=>'true']) !!}
          @include('asistencias.form.form_store')
          <div class="form-group col-md-6 col-md-offset-5">
            <a href="{{ route('asistencias.index',$id) }}" class="btn btn-default">Volver</a>
            {{ Form::submit('Registrar',['class'=>'btn btn-success']) }}
          </div>
          {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/asistencias.js') }}"></script>
@endsection
