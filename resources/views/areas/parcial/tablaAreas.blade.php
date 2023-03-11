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