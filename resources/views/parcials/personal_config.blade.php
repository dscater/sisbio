<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>config_personal</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th></th>
				<th>ID</th>
				<th>Código</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Teléfono</th>
				<th>Fecha de Empleo</th>
				<th>Dirección</th>
				<th>Fecha Despido</th>
				<th>Razón</th>
				<th>Nro de Tarjeta</th>
				<th>País</th>
				<th>Ciudad</th>
				<th>Email</th>
				<th>Título</th>
				<th>Género</th>
				<th>Cumpleaños</th>
				<th>Departamento</th>
			</tr>
		</thead>
		<tbody>
			@foreach($personals as $personal)
			@php
			$contrato_personal = $personal->contratos->where('estado','=','ACTIVO')->where('personals_id','=',$personal->id)->first()
			@endphp
			@if($contrato_personal)
			<tr>
				<td></td>
				<td>{{ $personal->id }}</td>
				<td></td>
				<td>{{ $personal->name }}</td>
				<td>{{ $personal->apep }} {{ $personal->apem }}</td>
				<td>{{ $personal->fono }}</td>
				<td>{{ $contrato_personal->fech_ingreso }}</td>
				<td></td>
				<td>{{ $contrato_personal->fech_retiro }}</td>
				<td></td>
				<td>0</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ $personal->genero }}</td>
				<td></td>
				<td>{{ $contrato_personal->unidad_areas_id }}</td>
			</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</body>
</html>
