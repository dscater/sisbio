<p>Numero de registros: {{$areas->total() }}. Página: {{$areas->currentPage()}} de {{$areas->lastPage()}}</p>
<h3>HORARIOS DE UNIDAD/ÁREA</h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="50px">Nro.</th>
      <th>Unidad/Area</th>
      <th>Ingreso mañana</th>
      <th>Salida mañana</th>
      <th>Ingreso tarde</th>
      <th>Salida tarde</th>
      <th>Observaciones</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <div style="display:none">{{$i=1}}</div>
    @if($areas->count() > 0)
    @foreach($areas as $area)
      <tr>
        <td>{{$i++}}</td>
        <td class="nombre_registro">{{ $area->name }}</td>
        @if($area->horario != null)
        <td>{{ date('G:i',strtotime($area->horario->ingreso_maniana)) }}</td>
        <td>{{ date('G:i',strtotime($area->horario->salida_maniana)) }}</td>
        <td>{{ date('G:i',strtotime($area->horario->ingreso_tarde)) }}</td>
        <td>{{ date('G:i',strtotime($area->horario->salida_tarde)) }}</td>
        <td>{{ $area->horario->observacion? :'(Sin observaciones)' }}</td>
        @else
        <td>(Sin configurar)</td>
        <td>(Sin configurar)</td>
        <td>(Sin configurar)</td>
        <td>(Sin configurar)</td>
        <td>(Sin configurar)</td>
        @endif
        @if($area->horario != null)
        <td width="10px">
          <a href="{{ route('horarios.edit',$area->horario->id) }}" title="Modificar" class="btn btn-warning">Modificar</a>
        </td>
        @else
        <td>
          <a href="{{ route('horarios.create',$area->id) }}" class="btn btn-primary">Configurar</a>
        </td>
        @endif
      </tr>
    @endforeach
    @else
    <tr><td colspan="100px">No se encontro ningún registro</td></tr>
    @endif
  </tbody>
</table>
<div id="paginacion_horario">
  {{ $areas->render() }}
</div>
