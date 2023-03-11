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
          <a href="{{ route('especializacions.create',$id) }}" class="btn btn-primary pull-right">Registrar especialización</a>
          <h4>Especialización personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('especializacions.index',$id) }}" hidden>
            <div class="col-md-12">
              <h4><i class="fa fa-search"></i> Buscar especialización:</h4>
            </div>
            <div class="col-md-3 col-xs-4">
              <input type="text" class="form-control institucion" placeholder="Institución">
            </div>
          </div>
          <div class="lista_especializacions">
            <p>Numero de registros: {{$especializacions->total() }}. Página: {{$especializacions->currentPage()}} de {{$especializacions->lastPage()}}</p>
            <h3>Especializaciones del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('especializacions.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="50px">Nro.</th>
                  <th>Universidad / Institución</th>
                  <th>Fecha inicio</th>
                  <th>Fecha culminación</th>
                  <th>Nombre curso</th>
                  <th>Duración</th>
                  <th>Archivo</th>
                  <th>Observaciones</th>
                  <th colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($especializacions->count() > 0)
                @foreach($especializacions as $especializacion)
                  <tr>
                    <td>{{$i++}}</td>
                    <td class="nombre_registro">{{ $especializacion->institucion }}</td>
                    <td>{{ date('d-m-Y',strtotime($especializacion->fech_ini)) }}</td>
                    <td>{{ date('d-m-Y',strtotime($especializacion->fech_culmi)) }}</td>
                    <td>{{ $especializacion->nombre_curso }}</td>
                    <td>{{ $especializacion->duracion }}</td>
                    <td>
                      <a href="{{ route('especializacions.descargar',$especializacion->id) }}" title="Descargar archivo">
                        <img src="{{ asset('imgs/descargar.png') }}" alt="" style="border-radius:50%; width:25px; height:25px;">
                      </a>
                    </td>
                    <td>{{ $especializacion->observacion?:'(Sin observaciones)' }}</td>
                    <td width="10px"><a href="{{ route('especializacions.edit',$especializacion->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="10px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('especializacions.destroy',$especializacion->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_especializacion">
              {{ $especializacions->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('formacion_academica.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_especializacion.js') }}"></script>
@endsection
