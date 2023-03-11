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
          <a href="{{ route('contratos.create',$id) }}" class="btn btn-primary pull-right">Registrar contrato</a>
          <h4>Contratos personal</h4>
        </div>
        <div class="panel-body">
          <div class="row" id="buscador">
            <input type="text" class="url_index" value="{{ route('contratos.index',$id) }}" hidden>
            <form action="" class="form-inline">
              <div class="form-group col-md-12">
                <h4><i class="fa fa-search"></i> Buscar:</h4>
              </div>
              <div class="form-group col-md-4 col-xs-4">
                <label>Fecha ingreso: </label>
                <input type="date" class="form-control fech_ingreso">
              </div>
              <div class="form-group col-md-4 col-xs-4">
                <label>Fecha retiro: </label>
                <input type="date" class="form-control fech_retiro">
              </div>
            </form>
          </div>
          <div class="lista_contratos">
            <p>Numero de registros: {{$contratos->total() }}. Página: {{$contratos->currentPage()}} de {{$contratos->lastPage()}}</p>
            <h3>Contratos del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('contratos.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th width="45px">Nro.</th>
                  <th>Fecha ingreso</th>
                  <th>Fecha retiro</th>
                  <th>Forma de pago</th>
                  <th>Salario Bs</th>
                  <th>Unidad/Área</th>
                  <th>Cargo</th>
                  <th>Tipo de contrato</th>
                  <th>Turno</th>
                  <th colspan="5" class="iconos-lg">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <div style="display:none">{{$i=1}}</div>
                @if($contratos->count() > 0)
                @foreach($contratos as $contrato)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{ date('d-m-Y',strtotime($contrato->fech_ingreso)) }}</td>
                    <td>{{ date('d-m-Y',strtotime($contrato->fech_retiro)) }}</td>
                    <td>{{ $contrato->forma_pago }}</td>
                    <td>{{ $contrato->salario }}</td>
                    <td>{{ $contrato->area->name }}</td>
                    <td>{{ $contrato->cargo->name }}</td>
                    <td>{{ $contrato->tipo_contrato}}</td>
                    <td>{{ $contrato->turno}}</td>
                    <td><a href="{{ route('contratos.show',$contrato->id) }}" title="Ver"><i class="fa fa-eye"></i></a></td>
                    <td><a href="{{ route('contratos.pdf_single',$contrato->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></td>
                    <td>
                      @if($contrato->estado == "ACTIVO")
                      <a href="{{ route('contratos.finalizar',$contrato->id) }}" class="btn btn-danger btn-sm">Finalizar</a>
                      @else
                      <a href="{{ route('contratos.show',$contrato->id) }}" class="btn btn-success btn-sm">Finalizado</a>
                      @endif
                    </td>
                    <td><a href="{{ route('contratos.edit',$contrato->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
                        <i class="fa fa-trash-alt"></i>
                      </a>
                      <input type="text" value="{{ route('contratos.destroy',$contrato->id) }}" class="ruta_eliminar" hidden>
                    </td>
                  </tr>
                @endforeach
                @else
                <tr><td colspan="100px">No se encontro ningún registro</td></tr>
                @endif
              </tbody>
            </table>
            <div id="paginacion_contrato">
              {{ $contratos->render() }}
            </div>
          </div>
        </div>
    </div>

    @include('contratos.modal.eliminar')

@endsection

@section('scripts')
<script src="{{ asset('js/eliminar.js') }}"></script>
<script src="{{ asset('js/buscar_contrato.js') }}"></script>
@endsection
