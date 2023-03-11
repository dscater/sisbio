<p>Numero de registros: {{$asistencias->total() }}. Página: {{$asistencias->currentPage()}} de {{$asistencias->lastPage()}}</p>
<h3>Asistencias del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('asistencias.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="50px">Nro.</th>
      <th width="15%">Fecha</th>
      <th width="10%">Hora ingreso mañana</th>
      <th width="10%">Hora salida mañana</th>
      <th width="10%">Hora ingreso mañana</th>
      <th width="10%">Hora salida mañana</th>
      <th>Estado</th>
      <th>Observaciones</th>
      <th colspan="2">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <div style="display:none">{{$i=1}}</div>
    @if($asistencias->count() > 0)
    @foreach($asistencias as $asistencia)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ date('d-m-Y',strtotime($asistencia->fecha)) }}</td>
        <td>{{ $asistencia->ingreso_maniana? :'Sin registrar' }}</td>
        <td>{{ $asistencia->salida_maniana? :'Sin registrar' }}</td>
        <td>{{ $asistencia->ingreso_tarde? :'Sin registrar' }}</td>
        <td>{{ $asistencia->salida_tarde? :'Sin registrar' }}</td>
        <td>{{ $asistencia->estado }}</td>
        <td>{{ $asistencia->observacion?:'(Sin observaciones)' }}</td>
        <td width="10px">
          <a href="{{ route('asistencias.edit',$asistencia->id) }}" title="Modificar" class="btn btn-info">
            @if($asistencia->ingreso_maniana != "" && $asistencia->ingreso_tarde == "")
            Registrar tarde
            @else
              @if($asistencia->ingreso_tarde !="" && $asistencia->ingreso_maniana == "")
                Registrar mañana
              @else
                Modificar asistencia
              @endif
            @endif
          </a>
        </td>
        <td width="10px">
          <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
            <i class="fa fa-trash-alt"></i>
          </a>
          <input type="text" value="{{ route('asistencias.destroy',$asistencia->id) }}" class="ruta_eliminar" hidden>
        </td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="100px">No se encontro ningún registro</td></tr>
    @endif
  </tbody>
</table>
<div id="paginacion_asistencias">
  {{ $asistencias->render() }}
</div>
