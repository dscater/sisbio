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
          <a href="{{ route('experiencias.create',$id) }}" class="btn btn-primary pull-right">Registrar experiencia</a>
          <h4>Experiencia personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('experiencias.index',$id) }}" hidden>
            <div class="col-md-12">
              <h4><i class="fa fa-search"></i> Buscar:</h4>
            </div>
            <div class="col-md-3 col-xs-4">
              <input type="text" class="form-control empresa_exp" placeholder="Empresa">
            </div>
          </div>
          <div class="lista_experiencias">
            <p>Numero de registros: {{$experiencias->total() }}. Página: {{$experiencias->currentPage()}} de {{$experiencias->lastPage()}}</p>
            <h3>Experiencia del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('experiencias.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="50px">Nro.</th>
                  <th>Empresa</th>
                  <th>Fecha inicio</th>
                  <th>Fecha culminación</th>
                  <th>Objeto de contratación</th>
                  <th>Cargo</th>
                  <th>Sueldo</th>
                  <th>Observacion</th>
                  <th colspan="2">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($experiencias->count() > 0)
                @foreach($experiencias as $experiencia)
                  <tr>
                    <td>{{$i++}}</td>
                    <td class="nombre_registro">{{ $experiencia->empresa }}</td>
                    <td>{{ date('d-m-Y',strtotime($experiencia->fech_ini)) }}</td>
                    <td>{{ date('d-m-Y',strtotime($experiencia->fech_culmi)) }}</td>
                    <td>{{ $experiencia->objeto_contratacion }}</td>
                    <td>{{ $experiencia->cargo }}</td>
                    <td>{{ $experiencia->sueldo }}</td>
                    <td>{{ $experiencia->observacion?:'(Sin observaciones)' }}</td>
                    <td width="10px"><a href="{{ route('experiencias.edit',$experiencia->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td width="10px">
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('experiencias.destroy',$experiencia->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_experiencia">
              {{ $experiencias->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('formacion_academica.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_experiencia.js') }}"></script>
@endsection
