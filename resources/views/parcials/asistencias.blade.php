<div class="contenedor_maniana">
    <h2>ASISTENCIA</h2>
    <div class="maniana">
        <div class="ingreso">
            <table border="2">
                <tbody>
                    <tr>
                        <td colspan="4" class="area">
                            @if ($contrato)
                                {{ $array_areas[$contrato->unidad_areas_id] }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="columna_maniana">Mañana</td>
                        <td colspan="2" class="columna_tarde">Tarde</td>
                    </tr>
                    <tr>
                        @if ($contrato_area_horario)
                            <td class="contenido_maniana">
                                {{ date('G:i', strtotime($contrato_area_horario->ingreso_maniana)) }}</td>
                            <td class="contenido_maniana">
                                {{ date('G:i', strtotime($contrato_area_horario->salida_maniana)) }}</td>
                            <td class="contenido_tarde">
                                {{ date('G:i', strtotime($contrato_area_horario->ingreso_tarde)) }}</td>
                            <td class="contenido_tarde">
                                {{ date('G:i', strtotime($contrato_area_horario->salida_tarde)) }}</td>
                        @else
                    </tr>
                    <tr>
                        <td colspan="4" class="contenido_horario">Horario no configurado</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="5"><img src="{{ asset('imgs/' . $ultima_asistencia->personal->foto) }}"
                                alt="foto"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="personal"><span><i class="fa fa-user"></i></span>
                            {{ $ultima_asistencia->personal->name }} {{ $ultima_asistencia->personal->apep }}
                            {{ $ultima_asistencia->personal->apem }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="columna_maniana">Mañana</td>
                        <td colspan="2" class="columna_tarde">Tarde</td>
                    </tr>
                    <tr>
                        @if ($ultima_asistencia->ingreso_maniana)
                            <td class="contenido_maniana">
                                {{ date('G:i', strtotime($ultima_asistencia->ingreso_maniana)) }}</td>
                        @else
                            <td class="contenido_maniana">S/R</td>
                        @endif
                        @if ($ultima_asistencia->salida_maniana)
                            <td class="contenido_maniana">
                                {{ date('G:i', strtotime($ultima_asistencia->salida_maniana)) }}</td>
                        @else
                            <td class="contenido_maniana">S/R</td>
                        @endif
                        @if ($ultima_asistencia->ingreso_tarde)
                            <td class="contenido_tarde">{{ date('G:i', strtotime($ultima_asistencia->ingreso_tarde)) }}
                            </td>
                        @else
                            <td class="contenido_tarde">S/R</td>
                        @endif
                        @if ($ultima_asistencia->salida_tarde)
                            <td class="contenido_tarde">{{ date('G:i', strtotime($ultima_asistencia->salida_tarde)) }}
                            </td>
                        @else
                            <td class="contenido_tarde">S/R</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
