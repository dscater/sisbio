@extends('layouts.inicio')

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
@if(session('msg'))
  {!! session('msg') !!}
@endif
    <div class="panel panel-default tabla">
        <div class="panel-heading">
          <a href="{{ route('pagos.create',$id) }}" class="btn btn-primary pull-right">Registrar nuevo pago</a>
          <h4>Pagos personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('pagos.index',$id) }}" hidden>
            <div class="col-md-12">
              <h4><i class="fa fa-search"></i> Buscar:</h4>
            </div>
            <div class="col-md-3 col-xs-4">
              {{ Form::select('anio',
              $array_anios
              ,null,['class'=>'form-control anio']) }}
            </div>
            <div class="col-md-3 col-xs-4">
              {{ Form::select('mes',
              $array_mes
              ,null,['class'=>'form-control mes']) }}
            </div>
            <div class="col-md-3 pull-rigth">
              <a href="{{ route('pagos.hitorial',$personal->id) }}" class="btn btn-info" target="_blank">Historial de pagos</a>
            </div>
          </div>
          <div class="lista_pagos">
            <p>Numero de registros: {{$pagos->total() }}. Página: {{$pagos->currentPage()}} de {{$pagos->lastPage()}}</p>
            <h3>Pagos del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}}</h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="50px">Nro.</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Días trabajados</th>
                  <th>Monto total (Bs.)</th>
                  <th colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($pagos->count() > 0)
                @foreach($pagos as $pago)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $array_mes[$pago->mes] }}</td>
                    <td>{{ $pago->anio }}</td>
                    <td>{{ $pago->dias_trabajado }}</td>
                    <td>{{ $pago->monto_total }}</td>
                    <td width="10px"><a href="{{ route('pagos.boleta',[$pago->personals_id,$pago->mes,$pago->anio]) }}" target="_blank" class="btn btn-info btn-sm" title="Boleta">Boleta</a></td>
                    <td width="10px"><a href="{{ route('pagos.show',$pago->id) }}" title="Ver"><i class="fa fa-search" style="color:rgb(255, 255, 255);"></i></a></td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_pagos">
              {{ $pagos->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('pagos.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/buscar_pago.js') }}"></script>
@endsection
