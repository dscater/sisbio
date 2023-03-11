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
          <a href="{{ route('areas.create') }}" class="btn btn-primary pull-right">Crear área / unidad</a>
          <h4>Unidades / Áreas</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('areas.index') }}" hidden>
            <div class="col-md-12">
              <h4><i class="fa fa-search"></i> Buscar área o unidad:</h4>
            </div>
            <div class="col-md-3 col-xs-4">
              <input type="text" class="form-control area" placeholder="Área o unidad">
            </div>
          </div>
          <div class="lista_areas">
            <p>Numero de registros: {{$areas->total() }}. Página: {{$areas->currentPage()}} de {{$areas->lastPage()}}</p>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="250">Área / Unidad</th>
                  <th>Descripción</th>
                  <th colspan="3">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @if($areas->count() > 0)
                @foreach($areas as $area)
                  <tr>
                    <td class="nombre_registro">{{ $area->name }}</td>
                    <td>{{ $area->description? :'(Sin descripción)' }}</td>
                    <td width="100px"><a href="{{ route('areas.show',$area->id) }}" title="Ver"><i class="fa fa-eye"></i></a></td>
                    <td width="100px"><a href="{{ route('areas.edit',$area->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="100px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('areas.destroy',$area->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_areas">
              {{ $areas->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('areas.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_area.js') }}"></script>
@endsection
