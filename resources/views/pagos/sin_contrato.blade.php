@extends('layouts.inicio')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/form_confirma.css') }}">
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
          <h4>Registrar pago</h4>
        </div>
        <div class="panel-body">
          <h3>EL PERSONAL: "<span style="font-weight:bold;text-decoration:underline">{{$personal->name}} {{$personal->apep}} {{$personal->apem}}</span>" NO CUENTA CON UN CONTRATO ACTIVO</h3>
          {!! Form::open() !!}
          <div class="form-group col-md-6 col-md-offset-5">
            <a href="{{ route('pagos.index',$id) }}" class="btn btn-default">Volver</a>
          </div>
          {!! Form::close() !!}
        </div>
    </div>
@endsection
