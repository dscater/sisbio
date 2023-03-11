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
          <div class="mensaje_error" style="color:#EA0808;">

          </div>
          {!! Form::open(['route'=>['pagos.store',$id],'method'=>'post','files'=>'true']) !!}
          @include('pagos.form.form_store')
          <div class="form-group col-md-6 col-md-offset-5">
            <a href="{{ route('pagos.index',$id) }}" class="btn btn-default">Volver</a>
            <a href="#" id="registrar_pago" class="btn btn-success">Registrar pago</a>
          </div>
          @include('pagos.modal.confirmar_pago')
          {!! Form::close() !!}
        </div>
        <input type="text" id="url_datos" value="{{ route('personals.datos_pago',$id) }}" hidden>
    </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/confirma_pago.js') }}"></script>
@endsection
