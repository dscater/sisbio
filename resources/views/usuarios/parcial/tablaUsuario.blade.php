<p>Numero de registros: {{$datos_usuarios->total() }}. Página: {{$datos_usuarios->currentPage()}} de {{$datos_usuarios->lastPage()}}</p>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Código</th>
      <th>Apellidos y nombres</th>
      <th>C.I.</th>
      <th>Celular</th>
      <th>Tipo de usuario</th>
      <th>Cargo</th>
      <th>Foto</th>
      <th colspan="3">Opciones</th>
    </tr>
  </thead>
  <tbody>
    @if($datos_usuarios->count() > 0)
    @foreach($datos_usuarios as $datos_usuario)
      <tr>
        <td>{{ $datos_usuario->user->name }}</td>
        <td class="nombre_registro">{{ $datos_usuario->apep }} {{ $datos_usuario->apem }} {{ $datos_usuario->name }}</td>
        <td>{{ $datos_usuario->ci }} {{ $datos_usuario->ci_exp }}</td>
        <td>{{ $datos_usuario->cel }}</td>
        <td>{{ $datos_usuario->user->roles->first()->name }}</td>
        <td>{{ $datos_usuario->cargo->name }}</td>
        <td><img src="{{ asset('imgs/'.$datos_usuario->foto) }}" alt="" width="80" height="80"></td>
        <td width="10"><a href="{{ route('users.show',$datos_usuario->id) }}" title="Ver"><i class="fa fa-eye"></i></a></td>
        <td width="10"><a href="{{ route('users.edit',$datos_usuario->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
        <td width="10">
          <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
            <i class="fa fa-trash-alt"></i>
          </a>
          <input type="text" value="{{ route('users.destroy',$datos_usuario->user->id) }}" class="ruta_eliminar" hidden>
        </td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="10">No se encontro ningún registro</td></tr>
    @endif
  </tbody>
</table>

<div id="paginacion_usuarios">
  {{ $datos_usuarios->render() }}
</div>