<p>Numero de registros: {{$pagos->total() }}. Página: {{$pagos->currentPage()}} de {{$pagos->lastPage()}}</p>
<h3>Pagos del personal: {{$personal->name}} {{$personal->apep}} {{$personal->apem}}</h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width="50px">Nro.</th>
      <th>Mes</th>
      <th>Año</th>
      <th>Días trabajados</th>
      <th>Monto total (Bs.)</th>
      <th colspan="2">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <div style="display:none">{{$i=1}}</div>
    @if($pagos->count() > 0)
    @foreach($pagos as $pago)
      <tr>
        <td>{{$i++}}</td>
        <td>{{ $array_mes[$pago->mes] }}</td>
        <td>{{ $pago->anio }}</td>
        <td>{{ $pago->dias_trabajado }}</td>
        <td>{{ $pago->monto_total }}</td>
        <td width="10px"><a href="{{ route('pagos.boleta',[$pago->personals_id,$pago->mes,$pago->anio]) }}" target="_blank" class="btn btn-info btn-sm" title="Boleta">Boleta</a></td>
        <td width="10px"><a href="{{ route('pagos.show',$pago->personals_id) }}" title="Ver"><i class="fa fa-search" style="color:rgb(255, 255, 255);"></i></a></td>
      </tr>
    @endforeach
    @else
    <tr><td colspan="100px">No se encontro ningún registro</td></tr>
    @endif
  </tbody>
</table>
<div id="paginacion_pagos">
  {{ $pagos->render() }}
</div>
