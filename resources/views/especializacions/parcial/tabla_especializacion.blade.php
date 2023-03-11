<p>Numero de registros: {{$especializacions->total() }}. Página: {{$especializacions->currentPage()}} de {{$especializacions->lastPage()}}</p>
<h3>Especializaciones del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('especializacions.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="5px">Nro.</th>
      <th>Universidad / Institución</th>
      <th>Fecha inicio</th>
      <th>Fecha culminación</th>
      <th>Nombre curso</th>
      <th>Duración</th>
      <th>Observaciones</th>
      <th colspan="3">Opciones</th>
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
