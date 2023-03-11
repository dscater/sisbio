
<p>Numero de registros: {{$personals->total() }}. Página: {{$personals->currentPage()}} de {{$personals->lastPage()}}</p>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Apellidos y Nombre(s)</th>
      <th>Foto</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    @if($personals->count() > 0)
    @foreach($personals as $personal)
      <tr>
        <td class="nombre_registro">{{ $personal->apep }} {{ $personal->apem }} {{ $personal->name }}</td>
        <td><img src="{{ asset('imgs/'.$personal->foto) }}" alt="foto" width="90" height="90"></td>
        <td width="10px" class="{{$tipo == 'asistencia'?'':'oculto'}} acceso" name="asistencia">
          <a href="{{ route('asistencias.index',$personal->id) }}" title="Asistencia" id="ruta_link"><i class="fa fa-clock"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'formacion'?'':'oculto'}} acceso" name="formacion">
          <a href="{{ route('formacions.index',$personal->id) }}" title="Ver formación" id="ruta_link"><i class="fa fa-user-graduate"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'especializacion'?'':'oculto'}} acceso" name="especializacion">
          <a href="{{ route('especializacions.index',$personal->id) }}" title="Ver especialización" id="ruta_link"><i class="fa fa-diagnoses"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'experiencia'?'':'oculto'}} acceso" name="experiencia">
          <a href="{{ route('experiencias.index',$personal->id) }}" title="Ver experiencia" id="ruta_link"><i class="fa fa-file-alt"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'contrato'?'':'oculto'}} acceso" name="contrato">
          <a href="{{ route('contratos.index',$personal->id) }}" title="Ver contrato" id="ruta_link"><i class="fa fa-list-alt"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'pagos_extra'?'':'oculto'}} acceso" name="pagos_extra">
          <a href="{{ route('pagos_extras.index',$personal->id) }}" title="Ver pagos extra" id="ruta_link"><i class="fa fa-money-bill"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'descuento'?'':'oculto'}} acceso" name="descuento">
          <a href="{{ route('descuentos.index',$personal->id) }}" title="Ver descuentos" id="ruta_link"><i class="fa fa-money-bill"></i></a>
        </td>
        <td width="10px" class="{{$tipo == 'pago'?'':'oculto'}} acceso" name="pago">
          <a href="{{ route('pagos.index',$personal->id) }}" title="pago" id="ruta_link"><i class="fa fa-hand-holding-usd"></i></a>
        </td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="100px">No se encontro ningún registro</td></tr>
    @endif
  </tbody>
</table>
<div id="paginacion_modal">
  {{ $personals->render() }}
</div>
