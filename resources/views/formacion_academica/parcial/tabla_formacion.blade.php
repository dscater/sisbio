<p>Numero de registros: {{$formacions->total() }}. Página: {{$formacions->currentPage()}} de {{$formacions->lastPage()}}</p>
<h3>Formación académica de: {{$personal->name}} {{$personal->apep}} {{$personal->apem}}</h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Universidad / Institución</th>
      <th>Fecha inicio</th>
      <th>Fecha culminación</th>
      <th>Grado académico</th>
      <th>Título</th>
      <th>Observaciones</th>
      <th colspan="3">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @if($formacions->count() > 0)
    @foreach($formacions as $formacion)
      <tr>
        <td class="nombre_registro">{{ $formacion->institucion }}</td>
        <td>{{ date('d-m-Y',strtotime($formacion->fech_ini)) }}</td>
        <td>{{ date('d-m-Y',strtotime($formacion->fech_culmi)) }}</td>
        <td>{{ $formacion->grado_academico }}</td>
        <td>{{ $formacion->titulo }}</td>
        <td>{{ $formacion->observacion?:'(Sin observaciones)' }}</td>
        <td width="10px"><a href="{{ route('formacions.show',$formacion->id) }}" title="Ver"><i class="fa fa-eye"></i></a></td>
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
