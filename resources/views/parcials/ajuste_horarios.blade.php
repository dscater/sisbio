<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajuste de horarios</title>
</head>
<body>
  <table border="1">
    <tbody>
      <tr>
        <td colspan="35">
          AJUSTE DE HORARIOS
        </td>
      </tr>
      <tr>
        <td colspan="35">
          Horarios
        </td>
      </tr>
      <tr>
        <td rowspan="2">Número</td>
        <td colspan="2">Primer Horario</td>
        <td colspan="2">Segundo Horario</td>
        <td colspan="2">Tiempo Extra</td>
      </tr>
      <tr>
        <td>Entrada</td>
        <td>Salida</td>
        <td>Entrada</td>
        <td>Salida</td>
        <td>Entrada</td>
        <td>Salida</td>
      </tr>
      @foreach($horarios as $horario)
      <tr>
        <td>{{ $horario->id }}</td>
        <td>{{ $horario->ingreso_maniana }}</td>
        <td>{{ $horario->salida_maniana }}</td>
        <td>{{ $horario->ingreso_tarde }}</td>
        <td>{{ $horario->salida_tarde }}</td>
        <td></td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
