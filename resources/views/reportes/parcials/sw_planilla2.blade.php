<table border="1">
    <thead>
        <tr>
            <th rowspan="2" width="2%">N°</th>
            <th rowspan="2" width="6%">CARNET DE IDENTIDAD</th>
            <th rowspan="2" width="10%">APELLIDOS Y NOMBRE</th>
            <th rowspan="2" width="5%">NACIONALIDAD</th>
            <th rowspan="2" width="">FECHA DE NACIMIENTO</th>
            <th rowspan="2" width="">SEXO (F/M)</th>
            <th rowspan="2" width="">OCUPACIÓN QUE DESEMPEÑA</th>
            <th rowspan="2" width="">FECHA DE INGRESO</th>
            <th rowspan="2" width="">FECHA DE RETIRO</th>
            <th rowspan="2" width="">DÍAS PAGADOS MES</th>
            <th rowspan="2" width="">HABER BÁSICO <br>(A)</th>
            <th rowspan="2" width="">BONO DE ANTIGUEDAD <br>(B)</th>
            <th width="" colspan="2">HORAS EXTRAS</th>
            <th width="" colspan="2">BONOS</th>
            <th rowspan="2" width="">TOTAL GANADO <br> (G) <br> A-B-C-D-E-F</th>
            <th width="" colspan="3">DESCUENTOS</th>
            <th rowspan="2" width="">TOTAL DCTOS. <br> (K) <br> H-I-J</th>
            <th rowspan="2" width="">LÍQUIDO PAGABLE <br>(L)<br>G-K</th>
            <th rowspan="2" width="8%">FIRMA DEL EMPLEADO</th>
        </tr>
        <tr>
            <th>NÚMERO</th>
            <th>MONTO PAGADO <br> (C)</th>
            <th>BONO DE PRODUCCIÓN</th>
            <th>OTROS BONOS <br> (I)</th>
            <th>AFP <br> {{ $afps->porcentaje }}% <br>(H)</th>
            <th>RC-IVA <br> {{ $riesgo_comun->porcentaje }}% <br>(H)</th>
            <th>OTROS DESCUENTOS<br>(J)</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
            $contador = 0;
        @endphp
        @foreach ($personal_area as $personalarea)
            @if ($array_pagos[$personalarea->id] != '0')
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $personalarea->ci }} {{ $personalarea->ci_exp }}</td>
                    <td class="izquierda">{{ $personalarea->apep }} {{ $personalarea->apem }} {{ $personalarea->name }}</td>
                    <td>{{ $personalarea->nacionalidad }}</td>
                    <td>{{ date('d/m/Y', strtotime($personalarea->fech_nac)) }}</td>
                    <td>{{ $personalarea->genero }}</td>
                    <td>{{ $array_cargos[$personalarea->cargos_id] }}</td>
                    <td>{{ date('d/m/Y', strtotime($personalarea->fech_ingreso)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($personalarea->fech_retiro)) }}</td>
                    {{-- <td>8</td> --}}
                    <td>{{ $array_pagos[$personalarea->id] }}</td>
                    <td>{{ $personalarea->salario }}</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>{{ $total_extra_horas[$personalarea->id] }}</td>
                    <td>0.00</td>
                    <td>{{ $total_extra_otros[$personalarea->id] }}</td>
                    <td>{{ $total_ingresos[$personalarea->id] }}</td>
                    <td>{{ $valor_afps[$personalarea->id] }}</td>
                    <td>{{ $valor_riesgo[$personalarea->id] }}</td>
                    @php
                        $suma_total_descuentos_otros = (float) $valor_fondo[$personalarea->id] + (float) $valor_comision[$personalarea->id] + (float) $total_descuento_anticipos[$personalarea->id] + (float) $total_descuento_otros[$personalarea->id];
                        $suma_total_descuentos_otros = number_format($suma_total_descuentos_otros, 2);
                    @endphp
                    <td>{{ $suma_total_descuentos_otros }}</td>
                    <td>{{ $total_descuentos[$personalarea->id] }}</td>
                    <td>{{ $total_liquido[$personalarea->id] }}</td>
                    <td></td>
                </tr>
                @php
                    $contador++;
                @endphp
            @endif
        @endforeach
        @if ($contador == 0)
            <tr>
                <td colspan="24">NO SE ENCONTRARON REGISTROS</td>
            </tr>
        @endif
    </tbody>
</table>
