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
          <a href="{{ route('formacions.create',$id) }}" class="btn btn-primary pull-right">Registrar formación</a>
          <h4>Formación académica personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('formacions.index',$id) }}" hidden>
            <div class="col-md-12">
              <h4><i class="fa fa-search"></i> Buscar formación:</h4>
            </div>
            <div class="col-md-3 col-xs-4">
              <input type="text" class="form-control institucion" placeholder="Institución">
            </div>
          </div>
          <div class="lista_institucions">
            <p>Numero de registros: {{$formacions->total() }}. Página: {{$formacions->currentPage()}} de {{$formacions->lastPage()}}</p>
            <h3>Formación académica de: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('formacions.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="50px">Nro.</th>
                  <th>Universidad / Institución</th>
                  <th>Fecha inicio</th>
                  <th>Fecha culminación</th>
                  <th>Grado académico</th>
                  <th>Título</th>
                  <th>Observaciones</th>
                  <th colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($formacions->count() > 0)
                @foreach($formacions as $formacion)
                  <tr>
                    <td>{{$i++}}</td>
                    <td class="nombre_registro">{{ $formacion->institucion }}</td>
                    <td>{{ date('d-m-Y',strtotime($formacion->fech_ini)) }}</td>
                    <td>{{ date('d-m-Y',strtotime($formacion->fech_culmi)) }}</td>
                    <td>{{ $formacion->grado_academico }}</td>
                    <td>
                      <a href="{{ route('formacions.descarga',$formacion->id) }}" title="Descargar título">
                        <img src="{{ asset('imgs/descargar.png') }}" alt="" style="border-radius:50%; width:25px; height:25px;">
                      </a>
                    </td>
                    <td>{{ $formacion->observacion?:'(Sin observaciones)' }}</td>
                    <td width="10px"><a href="{{ route('formacions.edit',$formacion->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="10px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('formacions.destroy',$formacion->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_formacion">
              {{ $formacions->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('formacion_academica.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_formacion.js') }}"></script>
@endsection
