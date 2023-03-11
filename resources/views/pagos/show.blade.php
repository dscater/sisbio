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
        <h4>Pago del mes de {{$array_mes[$pago->mes]}} del año {{$pago->anio}}</h4>
      </div>
      <div class="panel-body">
        {!! Form::model($pago,['route'=>['pagos.update',$pago->id],'method'=>'put','files'=>'true']) !!}
        @include('pagos.form.form_show')
        <div class="form-group col-md-6 col-md-offset-5">
          <a href="{{ route('pagos.index',$pago->personals_id) }}" class="btn btn-default">Volver</a>
        </div>
        {!! Form::close() !!}
      </div>
  </div>
@endsection
