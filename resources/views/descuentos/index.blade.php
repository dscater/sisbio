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
          <a href="{{ route('descuentos.create',$id) }}" class="btn btn-primary pull-right">Registrar nuevo descuento</a>
          <h4>Descuentos personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('descuentos.index',$id) }}" hidden>
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
          <div class="lista_descuentos">
            <p>Numero de registros: {{$descuentos->total() }}. Página: {{$descuentos->currentPage()}} de {{$descuentos->lastPage()}}</p>
            <h3>Descuentos del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('descuentos.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="50px">Nro.</th>
                  <th>Tipo descuento</th>
                  <th>Monto Bs.</th>
                  <th>Mes</th>
                  <th>Año</th>
                  <th>Fecha descuento</th>
                  <th>Descripción</th>
                  <th colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($descuentos->count() > 0)
                @foreach($descuentos as $descuento)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $descuento->tipo_descuento }}</td>
                    <td>{{ $descuento->monto }}</td>
                    <td>{{ $array_mes[$descuento->mes] }}</td>
                    <td>{{ $descuento->anio }}</td>
                    <td>{{ date('d-m-Y',strtotime($descuento->fecha_desc)) }}</td>
                    <td>{{ $descuento->descripcion?:'(Sin descripción)' }}</td>
                    <td width="10px"><a href="{{ route('descuentos.edit',$descuento->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="10px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('descuentos.destroy',$descuento->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_descuentos">
              {{ $descuentos->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('descuentos.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_descuento.js') }}"></script>
@endsection
