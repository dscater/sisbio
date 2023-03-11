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