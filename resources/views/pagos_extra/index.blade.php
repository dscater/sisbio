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
          <a href="{{ route('pagos_extras.create',$id) }}" class="btn btn-primary pull-right">Registrar nuevo pago extra</a>
          <h4>Pagos extra personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('pagos_extras.index',$id) }}" hidden>
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
          </div>
          <div class="lista_pagosExtra">
            <p>Numero de registros: {{$pagosExtras->total() }}. Página: {{$pagosExtras->currentPage()}} de {{$pagosExtras->lastPage()}}</p>
            <h3>Pagos extra del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('pagos_extras.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="50px">Nro.</th>
                  <th>Tipo de pago</th>
                  <th>Monto Bs.</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Fecha Pago</th>
                  <th>Descripción</th>
                  <th colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($pagosExtras->count() > 0)
                @foreach($pagosExtras as $pagoExtra)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $pagoExtra->tipo_pago }}</td>
                    <td>{{ $pagoExtra->monto }}</td>
                    <td>{{ $array_mes[$pagoExtra->mes] }}</td>
                    <td>{{ $pagoExtra->anio }}</td>
                    <td>{{ date('d-m-Y',strtotime($pagoExtra->fech_pago)) }}</td>
                    <td>{{ $pagoExtra->descripcion?:'(Sin descripción)' }}</td>
                    <td width="10px"><a href="{{ route('pagos_extras.edit',$pagoExtra->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="10px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('pagos_extras.destroy',$pagoExtra->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_pagosExtra">
              {{ $pagosExtras->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('pagos_extra.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_pagoExtra.js') }}"></script>
@endsection
