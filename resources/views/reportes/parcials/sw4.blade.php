<h4 class="area">(CORRESPODIENTE A TODOS LOS AÑOS)</h4>
<h4 class="area">UNIDAD Y/O ÁREA: {{$areas->where('id','=',$valor_area)->first()['name']}}</h4>
@for($anio = $menor_anio ; $anio <= $mayor_anio ;$anio++)
    <h4 style="text-align:center">{{$anio}}</h4>
    <h4>{{$array_mes_pdf[$valor_mes]}}</h4>
  <table  border="1">
    <thead>
      <tr>
        <th width="2.3%">Nro.</th>
        <th width="2.8%">C.I.</th>
        <th width="3.5%">NOMBRE COMPLETO</th>
        <th width="1%">SEXO</th>
        <th width="1%">1</th>
        <th width="1%">2</th>
        <th width="1%">3</th>
        <th width="1%">4</th>
        <th width="1%">5</th>
        <th width="1%">6</th>
        <th width="1%">7</th>
        <th width="1%">8</th>
        <th width="1%">9</th>
        <th width="1%">10</th>
        <th width="1%">11</th>
        <th width="1%">12</th>
        <th width="1%">13</th>
        <th width="1%">14</th>
        <th width="1%">15</th>
        <th width="1%">16</th>
        <th width="1%">17</th>
        <th width="1%">18</th>
        <th width="1%">19</th>
        <th width="1%">20</th>
        <th width="1%">21</th>
        <th width="1%">22</th>
        <th width="1%">23</th>
        <th width="1%">24</th>
        <th width="1%">25</th>
        <th width="1%">26</th>
        <th width="1%">27</th>
        <th width="1%">28</th>
        <th width="1%">29</th>
        <th width="1%">30</th>
        <th width="2.56%">ASISTIDOS (A)</th>
        <th width="2.56%">FALTAS (F)</th>
        <th width="2.56%">PERMISOS (P)</th>
        <th width="2.56%">VACACIONES (V)</th>
        <th width="2.56%">TOTAL DÍAS</th>
      </tr>
    </thead>
    <tbody>
      @php
      $i=1;
      @endphp
      @foreach($personal_area as $personalarea)
      @if($contador_existencia[$anio][$personalarea->id] != 30)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{$personalarea->ci}} {{$personalarea->ci_exp}}</td>
        <td>{{$personalarea->name}} {{$personalarea->apep}} {{$personalarea->apem}}</td>
        <td>{{$personalarea->genero}}</td>
        @for($dia = 1 ; $dia<=30 ;$dia++)
          @if(!empty($contenedor_asistencia[$anio][$dia][$personalarea->id][0]))
            @if($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ')
              <td>A</td>
            @endif
            @if($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'FALTA')
              <td>F</td>
            @endif
            @if($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'PERMISO')
              <td>P</td>
            @endif
            @if($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'VACACIONES')
              <td>V</td>
            @endif
          @else
              <td>F</td>
          @endif
        @endfor
        <td>{{$contador_asistencias[$anio][$personalarea->id]}}</td>
        <td>{{$contador_faltas[$anio][$personalarea->id]}}</td>
        <td>{{$contador_permisos[$anio][$personalarea->id]}}</td>
        <td>{{$contador_vacaciones[$anio][$personalarea->id]}}</td>
        <td>30</td>
      </tr>
      @endif
      @endforeach
  </tbody>
</table>
@endfor
