<p>Numero de registros: {{$contratos->total() }}. Página: {{$contratos->currentPage()}} de {{$contratos->lastPage()}}</p>
<h3>Contratos del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('contratos.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="50px">Nro.</th>
      <th>Fecha ingreso</th>
      <th>Fecha retiro</th>
      <th>Forma de pago</th>
      <th>Salario Bs</th>
      <th>Unidad/Área</th>
      <th>Cargo</th>
      <th>Tipo de contrato</th>
      <th>Turno</th>
      <th colspan="3">Opciones</th>
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
        <td width="10px"><a href="{{ route('contratos.edit',$contrato->id) }}" title="Pdf"><i class="fa fa-file-pdf"></i></a></td>
        <td width="10px"><a href="{{ route('contratos.edit',$contrato->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
        <td width="10px">
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
