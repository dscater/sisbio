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
          <a href="{{ route('cargos.create') }}" class="btn btn-primary pull-right">Crear cargo</a>
          <h4>Cargos</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('cargos.index') }}" hidden>
            <div class="col-md-12">
              <h4><i class="fa fa-search"></i> Buscar cargo:</h4>
            </div>
            <div class="col-md-3 col-xs-4">
              <input type="text" class="form-control cargo" placeholder="Cargo">
            </div>
          </div>
          <div class="lista_cargos">
            <p>Numero de registros: {{$cargos->total() }}. Página: {{$cargos->currentPage()}} de {{$cargos->lastPage()}}</p>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Cargo</th>
                  <th>Descripción</th>
                  <th colspan="3">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @if($cargos->count() > 0)
                @foreach($cargos as $cargo)
                  <tr>
                    <td class="nombre_registro">{{ $cargo->name }}</td>
                    <td>{{ $cargo->description? :'(Sin descripción)' }}</td>
                    <td width="100px"><a href="{{ route('cargos.show',$cargo->id) }}" title="Ver"><i class="fa fa-eye"></i></a></td>
                    <td width="100px"><a href="{{ route('cargos.edit',$cargo->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="100px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('cargos.destroy',$cargo->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_cargos">
              {{ $cargos->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('cargos.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_cargo.js') }}"></script>
@endsection
