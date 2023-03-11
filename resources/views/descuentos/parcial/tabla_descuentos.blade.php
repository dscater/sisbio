<p>Numero de registros: {{$descuentos->total() }}. Página: {{$descuentos->currentPage()}} de {{$descuentos->lastPage()}}</p>
<h3>Descuentos del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}} <a href="{{ route('descuentos.pdf',$personal->id) }}" target="_blank" title="Pdf"><i class="fa fa-file-pdf"></i></a></h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="50px">Nro.</th>
      <th>Tipo descuento</th>
      <th>Monto Bs.</th>
      <th>Mes</th>
      <th>Año</th>
      <th>Fecha descuento</th>
      <th>Descripción</th>
      <th colspan="2">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <div style="display:none">{{$i=1}}</div>
    @if($descuentos->count() > 0)
    @foreach($descuentos as $descuento)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $descuento->tipo_descuento }}</td>
        <td>{{ $descuento->monto }}</td>
        <td>{{ $array_mes[$descuento->mes] }}</td>
        <td>{{ $descuento->anio }}</td>
        <td>{{ date('d-m-Y',strtotime($descuento->fecha_desc)) }}</td>
        <td>{{ $descuento->descripcion?:'(Sin descripción)' }}</td>
        <td width="10px"><a href="{{ route('descuentos.edit',$descuento->id) }}" title="Modificar"><i class="fa fa-edit"></i></a></td>
        <td width="10px">
          <a href="#" data-toggle="modal" data-target="#modal_eliminar" class="eliminar" title="Eliminar">
            <i class="fa fa-trash-alt"></i>
          </a>
          <input type="text" value="{{ route('descuentos.destroy',$descuento->id) }}" class="ruta_eliminar" hidden>
        </td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="100px">No se encontro ningún registro</td></tr>
    @endif
  </tbody>
</table>
<div id="paginacion_descuentos">
  {{ $descuentos->render() }}
</div>
