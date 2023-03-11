<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajuste de turnos</title>
</head>
<style media="screen">
  table{
    table-layout: fixed;
  }

  table tbody tr td{
    word-wrap: break-word;
    font-size: 0.7em;
  }
</style>
<body>
  <table border="1" width="100%">
    <tbody>
      <tr>
        <td colspan="35"><h1>AJUSTE DE TURNOS</h1></td>
      </tr>
      <tr>
        <td colspan="35">
          Turnos Especiales:25-Permiso, 26-Salida,Nulo-Vacaciones
        </td>
      </tr>
      <tr>
        <td colspan="4"><strong>FECHA</strong></td>
        <td colspan="31">xD</td>
      </tr>
      <tr>
        <td rowspan="2">ID</td>
        <td rowspan="2">Nombre</td>
        <td rowspan="2">Departamento</td>
        <td rowspan="2">Tarjeta</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
        <td>13</td>
        <td>14</td>
        <td>15</td>
        <td>16</td>
        <td>17</td>
        <td>18</td>
        <td>19</td>
        <td>20</td>
        <td>21</td>
        <td>22</td>
        <td>23</td>
        <td>24</td>
        <td>25</td>
        <td>26</td>
        <td>27</td>
        <td>28</td>
        <td>29</td>
        <td>30</td>
        <td>31</td>
      </tr>
      <tr>
        <td>MAR</td>
        <td>MIE</td>
        <td>JUE</td>
        <td>VIE</td>
        <td>SAB</td>
        <td>DOM</td>
        <td>LUN</td>
        <td>MAR</td>
        <td>MIE</td>
        <td>JUE</td>
        <td>VIE</td>
        <td>SAB</td>
        <td>DOM</td>
        <td>LUN</td>
        <td>MAR</td>
        <td>MIE</td>
        <td>JUE</td>
        <td>VIE</td>
        <td>SAB</td>
        <td>DOM</td>
        <td>LUN</td>
        <td>MAR</td>
        <td>MIE</td>
        <td>JUE</td>
        <td>VIE</td>
        <td>SAB</td>
        <td>DOM</td>
        <td>LUN</td>
        <td>MAR</td>
        <td>MIE</td>
        <td>JUE</td>
      </tr>
      @foreach($personals as $personal)
      @php
        $contrato_personal = $personal->contratos->where('estado','=','ACTIVO')->where('personals_id','=',$personal->id)->first()
      @endphp
        <tr>
          <td>{{ $personal->id }}</td>
          <td>{{ $personal->name }}</td>
          <td>{{ $array_area[$contrato_personal->unidad_areas_id] }}</td>
          <td></td>

          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
