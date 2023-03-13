<?php

namespace sisbio\Http\Controllers;

use Illuminate\Http\Request;

use sisbio\Empresa;
use sisbio\DatosUsuario;
use sisbio\UnidadArea;
use sisbio\Asistencia;
use sisbio\Personal;

use sisbio\Tasa;
use sisbio\PagosExtra;
use sisbio\Descuento;
use sisbio\Cargo;
use sisbio\Contratos;

use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{
    public function index()
    {
        $empresa = Empresa::get()->first();

        $anio_actual = date('Y');
        $mes_actual = date('m');

        $array_mes = [
            '' => '- Mes -',
            'todos' => 'TODOS',
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];

        $anio_comienzo = $anio_actual - 5;

        $array_anios = ['' => '- Año -', 'todos' => 'TODOS'];
        for ($i = 1; $i <= 8; $i++) {
            $array_anios[$anio_comienzo + $i] = $anio_comienzo + $i;
        }

        $areas = UnidadArea::get();
        $array_areas = ['' => '- Seleccione la unidad/área -', 'todos' => 'TODOS'];
        foreach ($areas as $area) {
            $array_areas[$area->id] = $area->name;
        }

        /***********************************
      arrays2
         ***********************************/
        $array_mes2 = [
            '' => '- Mes -',
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];

        $anio_comienzo = $anio_actual - 5;

        $array_anios2 = ['' => '- Año -'];
        for ($i = 1; $i <= 8; $i++) {
            $array_anios2[$anio_comienzo + $i] = $anio_comienzo + $i;
        }

        $areas = UnidadArea::get();
        $array_areas2 = ['' => '- Seleccione la unidad/área -'];
        foreach ($areas as $area) {
            $array_areas2[$area->id] = $area->name;
        }

        return view('reportes.index', compact(
            'empresa',
            'array_mes',
            'anio_actual',
            'array_anios',
            'array_areas',
            'array_mes2',
            'array_anios2',
            'array_areas2'
        ));
    }

    public function usuarios()
    {
        $datos_users = DatosUsuario::get();
        $i = 1;

        $empresa = Empresa::get()->first();

        $pdf = PDF::loadView('reportes.usuarios', compact('datos_users', 'i', 'empresa'))
            ->setPaper('a4', 'landscape');
        return $pdf->stream('Usuarios.pdf');
    }

    public function asistencias(Request $request)
    {
        $array_mes_pdf = [
            '01' => 'ENERO',
            '02' => 'FEBRERO',
            '03' => 'MARZO',
            '04' => 'ABRIL',
            '05' => 'MAYO',
            '06' => 'JUNIO',
            '07' => 'JULIO',
            '08' => 'AGOSTO',
            '09' => 'SEPTIEMBRE',
            '10' => 'OCTUBRE',
            '11' => 'NOVIEMBRE',
            '12' => 'DICIEMBRE',
        ];

        $empresa = Empresa::get()->first();

        $valor_area = $request->input('area');
        $valor_mes = $request->input('mes');
        $valor_anio = $request->input('anio');

        $sw = 0;

        $menor_anio = substr(Asistencia::min('fecha'), 0, 4);
        $mayor_anio = substr(Asistencia::max('fecha'), 0, 4);

        set_time_limit(50000);

        // TODOS
        if ($valor_area == 'todos' && $valor_mes == 'todos' && $valor_anio == 'todos') {
            $sw = 1;

            $menor_anio = substr(Asistencia::min('fecha'), 0, 4);
            $mayor_anio = substr(Asistencia::max('fecha'), 0, 4);

            $areas = UnidadArea::get();

            foreach ($areas as $area) {
                $personal_area[$area->id] = Personal::select('personals.*')
                    ->join('contratos', 'contratos.personals_id', 'personals.id')
                    ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                    ->where('unidad_areas.id', '=', $area->id)
                    ->where('contratos.estado', '=', 'ACTIVO')
                    ->get();

                foreach ($personal_area[$area->id] as $personalarea) {
                    $valor_dia = '';
                    $valor_mes = '';

                    for ($anio = $menor_anio; $anio <= $mayor_anio; $anio++) {
                        for ($mes = 1; $mes <= 12; $mes++) {
                            // contadores por personal
                            $contador_asistencias[$area->id][$anio][$mes][$personalarea->id] = 0;
                            $contador_faltas[$area->id][$anio][$mes][$personalarea->id] = 0;
                            $contador_permisos[$area->id][$anio][$mes][$personalarea->id] = 0;
                            $contador_vacaciones[$area->id][$anio][$mes][$personalarea->id] = 0;
                            $contador_existencia[$area->id][$anio][$mes][$personalarea->id] = 0;

                            if ($mes < 10) {
                                $valor_mes = '0' . $mes;
                            } else {
                                $valor_mes = $mes;
                            }
                            for ($dia = 1; $dia <= 30; $dia++) {
                                if ($dia < 10) {
                                    $valor_dia = '0' . $dia;
                                } else {
                                    $valor_dia = $dia;
                                }
                                $contenedor_asistencia[$area->id][$anio][$mes][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $anio . '-' . $valor_mes . '-' . $valor_dia)
                                    ->where('personals_id', '=', $personalarea->id)
                                    ->get();
                                // Verificando parametro de asistencia
                                if (!empty($contenedor_asistencia[$area->id][$anio][$mes][$dia][$personalarea->id][0])) {
                                    if ($contenedor_asistencia[$area->id][$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                        $contador_asistencias[$area->id][$anio][$mes][$personalarea->id] = $contador_asistencias[$area->id][$anio][$mes][$personalarea->id] + 1;
                                    }
                                    if ($contenedor_asistencia[$area->id][$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                        $contador_faltas[$area->id][$anio][$mes][$personalarea->id] = $contador_faltas[$area->id][$anio][$mes][$personalarea->id] + 1;
                                    }
                                    if ($contenedor_asistencia[$area->id][$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                        $contador_permisos[$area->id][$anio][$mes][$personalarea->id] = $contador_permisos[$area->id][$anio][$mes][$personalarea->id] + 1;
                                    }
                                    if ($contenedor_asistencia[$area->id][$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                        $contador_vacaciones[$area->id][$anio][$mes][$personalarea->id] = $contador_vacaciones[$area->id][$anio][$mes][$personalarea->id] + 1;
                                    }
                                } else {
                                    $contador_faltas[$area->id][$anio][$mes][$personalarea->id] = $contador_faltas[$area->id][$anio][$mes][$personalarea->id] + 1;
                                    $contador_existencia[$area->id][$anio][$mes][$personalarea->id] = $contador_existencia[$area->id][$anio][$mes][$personalarea->id] + 1;
                                }
                            }
                        }
                    }
                }
            }

            // return view('reportes.asistencias',compact('areas','empresa','sw',
            // 'personal_area','valor_area','valor_mes','valor_anio','array_mes_pdf','valor_area',
            // 'contenedor_asistencia','menor_anio','mayor_anio',
            // 'contador_asistencias','contador_faltas','contador_permisos','contador_vacaciones','contador_existencia'));

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'menor_anio',
                'mayor_anio',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('A4', 'landscape');

            return $pdf->stream('Asistencias.pdf');
        }

        // TODOS DISTINTOS
        if ($valor_area != 'todos' && $valor_mes != 'todos' && $valor_anio != 'todos') {
            $sw = 2;
            $areas = UnidadArea::get();
            $fecha_contar = $valor_anio . '-' . $valor_mes;

            $personal_area = Personal::select('personals.*')
                ->join('contratos', 'contratos.personals_id', 'personals.id')
                ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                ->where('unidad_areas.id', '=', $valor_area)
                ->where('contratos.estado', '=', 'ACTIVO')
                ->get();


            foreach ($personal_area as $personalarea) {
                // contadores por personal
                $contador_asistencias[$personalarea->id] = 0;
                $contador_faltas[$personalarea->id] = 0;
                $contador_permisos[$personalarea->id] = 0;
                $contador_vacaciones[$personalarea->id] = 0;
                $contador_existencia[$personalarea->id] = 0;

                $valor_dia = '';

                for ($dia = 1; $dia <= 30; $dia++) {
                    if ($dia < 10) {
                        $valor_dia = '0' . $dia;
                    } else {
                        $valor_dia = $dia;
                    }
                    $contenedor_asistencia[$dia][$personalarea->id] = Asistencia::where('fecha', '=', $fecha_contar . '-' . $valor_dia)
                        ->where('personals_id', '=', $personalarea->id)
                        ->get();
                    // Verificando parametro de asistencia
                    if (!empty($contenedor_asistencia[$dia][$personalarea->id][0])) {
                        if ($contenedor_asistencia[$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                            $contador_asistencias[$personalarea->id] = $contador_asistencias[$personalarea->id] + 1;
                        }
                        if ($contenedor_asistencia[$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                            $contador_faltas[$personalarea->id] = $contador_faltas[$personalarea->id] + 1;
                        }
                        if ($contenedor_asistencia[$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                            $contador_permisos[$personalarea->id] = $contador_permisos[$personalarea->id] + 1;
                        }
                        if ($contenedor_asistencia[$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                            $contador_vacaciones[$personalarea->id] = $contador_vacaciones[$personalarea->id] + 1;
                        }
                    } else {
                        $contador_faltas[$personalarea->id] = $contador_faltas[$personalarea->id] + 1;
                        $contador_existencia[$personalarea->id] = $contador_existencia[$personalarea->id] + 1;
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }

        // OTROS
        if ($valor_area != 'todos' && $valor_mes == 'todos' && $valor_anio == 'todos') {
            $sw = 3;

            $menor_anio = substr(Asistencia::min('fecha'), 0, 4);
            $mayor_anio = substr(Asistencia::max('fecha'), 0, 4);

            $areas = UnidadArea::get();

            $personal_area = Personal::select('personals.*')
                ->join('contratos', 'contratos.personals_id', 'personals.id')
                ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                ->where('unidad_areas.id', '=', $valor_area)
                ->where('contratos.estado', '=', 'ACTIVO')
                ->get();

            foreach ($personal_area as $personalarea) {
                $valor_dia = '';
                $valor_mes = '';

                for ($anio = $menor_anio; $anio <= $mayor_anio; $anio++) {
                    for ($mes = 1; $mes <= 12; $mes++) {
                        // contadores por personal
                        $contador_asistencias[$anio][$mes][$personalarea->id] = 0;
                        $contador_faltas[$anio][$mes][$personalarea->id] = 0;
                        $contador_permisos[$anio][$mes][$personalarea->id] = 0;
                        $contador_vacaciones[$anio][$mes][$personalarea->id] = 0;
                        $contador_existencia[$anio][$mes][$personalarea->id] = 0;

                        if ($mes < 10) {
                            $valor_mes = '0' . $mes;
                        } else {
                            $valor_mes = $mes;
                        }
                        for ($dia = 1; $dia <= 30; $dia++) {
                            if ($dia < 10) {
                                $valor_dia = '0' . $dia;
                            } else {
                                $valor_dia = $dia;
                            }
                            $contenedor_asistencia[$anio][$mes][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $anio . '-' . $valor_mes . '-' . $valor_dia)
                                ->where('personals_id', '=', $personalarea->id)
                                ->get();
                            // Verificando parametro de asistencia
                            if (!empty($contenedor_asistencia[$anio][$mes][$dia][$personalarea->id][0])) {
                                if ($contenedor_asistencia[$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                    $contador_asistencias[$anio][$mes][$personalarea->id] = $contador_asistencias[$anio][$mes][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                    $contador_faltas[$anio][$mes][$personalarea->id] = $contador_faltas[$anio][$mes][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                    $contador_permisos[$anio][$mes][$personalarea->id] = $contador_permisos[$anio][$mes][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$anio][$mes][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                    $contador_vacaciones[$anio][$mes][$personalarea->id] = $contador_vacaciones[$anio][$mes][$personalarea->id] + 1;
                                }
                            } else {
                                $contador_faltas[$anio][$mes][$personalarea->id] = $contador_faltas[$anio][$mes][$personalarea->id] + 1;
                                $contador_existencia[$anio][$mes][$personalarea->id] = $contador_existencia[$anio][$mes][$personalarea->id] + 1;
                            }
                        }
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'menor_anio',
                'mayor_anio',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }

        if ($valor_area != 'todos' && $valor_mes != 'todos' && $valor_anio == 'todos') {
            $sw = 4;

            $areas = UnidadArea::get();

            $menor_anio = substr(Asistencia::min('fecha'), 0, 4);
            $mayor_anio = substr(Asistencia::max('fecha'), 0, 4);

            $personal_area = Personal::select('personals.*')
                ->join('contratos', 'contratos.personals_id', 'personals.id')
                ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                ->where('unidad_areas.id', '=', $valor_area)
                ->where('contratos.estado', '=', 'ACTIVO')
                ->get();


            foreach ($personal_area as $personalarea) {

                for ($anio = $menor_anio; $anio <= $mayor_anio; $anio++) {
                    // contadores por personal
                    $contador_asistencias[$anio][$personalarea->id] = 0;
                    $contador_faltas[$anio][$personalarea->id] = 0;
                    $contador_permisos[$anio][$personalarea->id] = 0;
                    $contador_vacaciones[$anio][$personalarea->id] = 0;
                    $contador_existencia[$anio][$personalarea->id] = 0;

                    for ($dia = 1; $dia <= 30; $dia++) {
                        if ($dia < 10) {
                            $valor_dia = '0' . $dia;
                        } else {
                            $valor_dia = $dia;
                        }
                        $contenedor_asistencia[$anio][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $anio . '-' . $valor_mes . '-' . $valor_dia)
                            ->where('personals_id', '=', $personalarea->id)
                            ->get();
                        // Verificando parametro de asistencia
                        if (!empty($contenedor_asistencia[$anio][$dia][$personalarea->id][0])) {
                            if ($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                $contador_asistencias[$anio][$personalarea->id] = $contador_asistencias[$anio][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                $contador_faltas[$anio][$personalarea->id] = $contador_faltas[$anio][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                $contador_permisos[$anio][$personalarea->id] = $contador_permisos[$anio][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$anio][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                $contador_faltas[$anio][$personalarea->id] = $contador_faltas[$anio][$personalarea->id] + 1;
                                $contador_vacaciones[$anio][$personalarea->id] = $contador_vacaciones[$anio][$personalarea->id] + 1;
                            }
                        } else {
                            $contador_existencia[$anio][$personalarea->id] = $contador_existencia[$anio][$personalarea->id] + 1;
                        }
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'menor_anio',
                'mayor_anio',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }

        if ($valor_area != 'todos' && $valor_mes == 'todos' && $valor_anio != 'todos') {
            $sw = 5;

            $areas = UnidadArea::get();
            $fecha_contar = $valor_anio;

            $personal_area = Personal::select('personals.*')
                ->join('contratos', 'contratos.personals_id', 'personals.id')
                ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                ->where('unidad_areas.id', '=', $valor_area)
                ->where('contratos.estado', '=', 'ACTIVO')
                ->get();


            foreach ($personal_area as $personalarea) {
                $valor_dia = '';
                $valor_mes = '';

                for ($mes = 1; $mes <= 12; $mes++) {
                    // contadores por personal
                    $contador_asistencias[$mes][$personalarea->id] = 0;
                    $contador_faltas[$mes][$personalarea->id] = 0;
                    $contador_permisos[$mes][$personalarea->id] = 0;
                    $contador_vacaciones[$mes][$personalarea->id] = 0;
                    $contador_existencia[$mes][$personalarea->id] = 0;

                    if ($mes < 10) {
                        $valor_mes = '0' . $mes;
                    } else {
                        $valor_mes = $mes;
                    }
                    for ($dia = 1; $dia <= 30; $dia++) {
                        if ($dia < 10) {
                            $valor_dia = '0' . $dia;
                        } else {
                            $valor_dia = $dia;
                        }
                        $contenedor_asistencia[$mes][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $fecha_contar . '-' . $valor_mes . '-' . $valor_dia)
                            ->where('personals_id', '=', $personalarea->id)
                            ->get();
                        // Verificando parametro de asistencia
                        if (!empty($contenedor_asistencia[$mes][$dia][$personalarea->id][0])) {
                            if ($contenedor_asistencia[$mes][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                $contador_asistencias[$mes][$personalarea->id] = $contador_asistencias[$mes][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$mes][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                $contador_faltas[$mes][$personalarea->id] = $contador_faltas[$mes][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$mes][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                $contador_permisos[$mes][$personalarea->id] = $contador_permisos[$mes][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$mes][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                $contador_vacaciones[$mes][$personalarea->id] = $contador_vacaciones[$mes][$personalarea->id] + 1;
                            }
                        } else {
                            $contador_faltas[$mes][$personalarea->id] = $contador_faltas[$mes][$personalarea->id] + 1;
                            $contador_existencia[$mes][$personalarea->id] = $contador_existencia[$mes][$personalarea->id] + 1;
                        }
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }

        if ($valor_area == 'todos' && $valor_mes != 'todos' && $valor_anio != 'todos') {
            $sw = 6;

            $areas = UnidadArea::get();
            $fecha_contar = $valor_anio . '-' . $valor_mes;

            foreach ($areas as $area) {
                $personal_area[$area->id] = Personal::select('personals.*')
                    ->join('contratos', 'contratos.personals_id', 'personals.id')
                    ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                    ->where('unidad_areas.id', '=', $area->id)
                    ->where('contratos.estado', '=', 'ACTIVO')
                    ->get();

                foreach ($personal_area[$area->id] as $personalarea) {
                    // contadores por personal
                    $contador_asistencias[$area->id][$personalarea->id] = 0;
                    $contador_faltas[$area->id][$personalarea->id] = 0;
                    $contador_permisos[$area->id][$personalarea->id] = 0;
                    $contador_vacaciones[$area->id][$personalarea->id] = 0;
                    $contador_existencia[$area->id][$personalarea->id] = 0;

                    $valor_dia = '';

                    for ($dia = 1; $dia <= 30; $dia++) {
                        if ($dia < 10) {
                            $valor_dia = '0' . $dia;
                        } else {
                            $valor_dia = $dia;
                        }
                        $contenedor_asistencia[$area->id][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $fecha_contar . '-' . $valor_dia)
                            ->where('personals_id', '=', $personalarea->id)
                            ->get();
                        // Verificando parametro de asistencia
                        if (!empty($contenedor_asistencia[$area->id][$dia][$personalarea->id][0])) {
                            if ($contenedor_asistencia[$area->id][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                $contador_asistencias[$area->id][$personalarea->id] = $contador_asistencias[$area->id][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$area->id][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                $contador_faltas[$area->id][$personalarea->id] = $contador_faltas[$area->id][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$area->id][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                $contador_permisos[$area->id][$personalarea->id] = $contador_permisos[$area->id][$personalarea->id] + 1;
                            }
                            if ($contenedor_asistencia[$area->id][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                $contador_vacaciones[$area->id][$personalarea->id] = $contador_vacaciones[$area->id][$personalarea->id] + 1;
                            }
                        } else {
                            $contador_faltas[$area->id][$personalarea->id] = $contador_faltas[$area->id][$personalarea->id] + 1;
                            $contador_existencia[$area->id][$personalarea->id] = $contador_existencia[$area->id][$personalarea->id] + 1;
                        }
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }

        if ($valor_area == 'todos' && $valor_mes == 'todos' && $valor_anio != 'todos') {
            $sw = 7;

            $areas = UnidadArea::get();
            $fecha_contar = $valor_anio;

            foreach ($areas as $area) {
                $personal_area[$area->id] = Personal::select('personals.*')
                    ->join('contratos', 'contratos.personals_id', 'personals.id')
                    ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                    ->where('unidad_areas.id', '=', $area->id)
                    ->where('contratos.estado', '=', 'ACTIVO')
                    ->get();

                foreach ($personal_area[$area->id] as $personalarea) {
                    $valor_dia = '';

                    for ($mes = 1; $mes <= 12; $mes++) {
                        // contadores por personal
                        $contador_asistencias[$area->id][$mes][$personalarea->id] = 0;
                        $contador_faltas[$area->id][$mes][$personalarea->id] = 0;
                        $contador_permisos[$area->id][$mes][$personalarea->id] = 0;
                        $contador_vacaciones[$area->id][$mes][$personalarea->id] = 0;
                        $contador_existencia[$area->id][$mes][$personalarea->id] = 0;

                        if ($mes < 10) {
                            $valor_mes = '0' . $mes;
                        } else {
                            $valor_mes = $mes;
                        }
                        for ($dia = 1; $dia <= 30; $dia++) {
                            if ($dia < 10) {
                                $valor_dia = '0' . $dia;
                            } else {
                                $valor_dia = $dia;
                            }
                            $contenedor_asistencia[$area->id][$mes][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $fecha_contar . '-' . $valor_mes . '-' . $valor_dia)
                                ->where('personals_id', '=', $personalarea->id)
                                ->get();
                            // Verificando parametro de asistencia
                            if (!empty($contenedor_asistencia[$area->id][$mes][$dia][$personalarea->id][0])) {
                                if ($contenedor_asistencia[$area->id][$mes][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                    $contador_asistencias[$area->id][$mes][$personalarea->id] = $contador_asistencias[$area->id][$mes][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$area->id][$mes][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                    $contador_faltas[$area->id][$mes][$personalarea->id] = $contador_faltas[$area->id][$mes][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$area->id][$mes][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                    $contador_permisos[$area->id][$mes][$personalarea->id] = $contador_permisos[$area->id][$mes][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$area->id][$mes][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                    $contador_vacaciones[$area->id][$mes][$personalarea->id] = $contador_vacaciones[$area->id][$mes][$personalarea->id] + 1;
                                }
                            } else {
                                $contador_faltas[$area->id][$mes][$personalarea->id] = $contador_faltas[$area->id][$mes][$personalarea->id] + 1;
                                $contador_existencia[$area->id][$mes][$personalarea->id] = $contador_existencia[$area->id][$mes][$personalarea->id] + 1;
                            }
                        }
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }

        /*******************************
      SW8
         ******************************/
        if ($valor_area == 'todos' && $valor_mes != 'todos' && $valor_anio == 'todos') {
            $sw = 8;

            $menor_anio = substr(Asistencia::min('fecha'), 0, 4);
            $mayor_anio = substr(Asistencia::max('fecha'), 0, 4);

            $areas = UnidadArea::get();
            $fecha_contar = $valor_anio;

            foreach ($areas as $area) {
                $personal_area[$area->id] = Personal::select('personals.*')
                    ->join('contratos', 'contratos.personals_id', 'personals.id')
                    ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                    ->where('unidad_areas.id', '=', $area->id)
                    ->where('contratos.estado', '=', 'ACTIVO')
                    ->get();

                foreach ($personal_area[$area->id] as $personalarea) {
                    $valor_dia = '';

                    for ($anio = $menor_anio; $anio <= $mayor_anio; $anio++) {
                        // contadores por personal
                        $contador_asistencias[$area->id][$anio][$personalarea->id] = 0;
                        $contador_faltas[$area->id][$anio][$personalarea->id] = 0;
                        $contador_permisos[$area->id][$anio][$personalarea->id] = 0;
                        $contador_vacaciones[$area->id][$anio][$personalarea->id] = 0;
                        $contador_existencia[$area->id][$anio][$personalarea->id] = 0;

                        for ($dia = 1; $dia <= 30; $dia++) {
                            if ($dia < 10) {
                                $valor_dia = '0' . $dia;
                            } else {
                                $valor_dia = $dia;
                            }
                            $contenedor_asistencia[$area->id][$anio][$dia][$personalarea->id] = Asistencia::where('fecha', '=', $anio . '-' . $valor_mes . '-' . $valor_dia)
                                ->where('personals_id', '=', $personalarea->id)
                                ->get();
                            // Verificando parametro de asistencia
                            if (!empty($contenedor_asistencia[$area->id][$anio][$dia][$personalarea->id][0])) {
                                if ($contenedor_asistencia[$area->id][$anio][$dia][$personalarea->id][0]['estado'] == 'ASISTIÓ') {
                                    $contador_asistencias[$area->id][$anio][$personalarea->id] = $contador_asistencias[$area->id][$anio][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$area->id][$anio][$dia][$personalarea->id][0]['estado'] == 'FALTA') {
                                    $contador_faltas[$area->id][$anio][$personalarea->id] = $contador_faltas[$area->id][$anio][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$area->id][$anio][$dia][$personalarea->id][0]['estado'] == 'PERMISO') {
                                    $contador_permisos[$area->id][$anio][$personalarea->id] = $contador_permisos[$area->id][$anio][$personalarea->id] + 1;
                                }
                                if ($contenedor_asistencia[$area->id][$anio][$dia][$personalarea->id][0]['estado'] == 'VACACIONES') {
                                    $contador_vacaciones[$area->id][$anio][$personalarea->id] = $contador_vacaciones[$area->id][$anio][$personalarea->id] + 1;
                                }
                            } else {
                                $contador_faltas[$area->id][$anio][$personalarea->id] = $contador_faltas[$area->id][$anio][$personalarea->id] + 1;
                                $contador_existencia[$area->id][$anio][$personalarea->id] = $contador_existencia[$area->id][$anio][$personalarea->id] + 1;
                            }
                        }
                    }
                }
            }

            $pdf = PDF::loadView('reportes.asistencias', compact(
                'areas',
                'empresa',
                'sw',
                'personal_area',
                'valor_area',
                'valor_mes',
                'valor_anio',
                'array_mes_pdf',
                'valor_area',
                'contenedor_asistencia',
                'menor_anio',
                'mayor_anio',
                'contador_asistencias',
                'contador_faltas',
                'contador_permisos',
                'contador_vacaciones',
                'contador_existencia'
            ))
                ->setPaper('a4', 'landscape');
            return $pdf->stream('Asistencias.pdf');
        }
    }

    public function planilla(Request $request)
    {
        $array_mes_pdf = [
            '01' => 'ENERO',
            '02' => 'FEBRERO',
            '03' => 'MARZO',
            '04' => 'ABRIL',
            '05' => 'MAYO',
            '06' => 'JUNIO',
            '07' => 'JULIO',
            '08' => 'AGOSTO',
            '09' => 'SEPTIEMBRE',
            '10' => 'OCTUBRE',
            '11' => 'NOVIEMBRE',
            '12' => 'DICIEMBRE',
        ];

        $empresa = Empresa::get()->first();
        $areas = UnidadArea::all();

        $valor_area = $request->input('area');
        $valor_mes = $request->input('mes');
        $valor_anio = $request->input('anio');

        $sw = 0;

        if ($valor_area != 'todos' && $valor_mes != 'todos' && $valor_anio != 'todos') {
            $sw = 2;

            // 1) obtener el personal y su área
            $personal_area = Personal::select(
                'personals.ci',
                'personals.ci_exp',
                'personals.name',
                'personals.apep',
                'personals.apem',
                'personals.genero',
                'personals.nacionalidad',
                'personals.fech_nac',
                'contratos.cargos_id',
                'contratos.fech_ingreso',
                'contratos.fech_retiro',
                'contratos.salario',
                'personals.id'
            )
                ->join('contratos', 'contratos.personals_id', 'personals.id')
                ->join('unidad_areas', 'unidad_areas.id', '=', 'contratos.unidad_areas_id')
                ->where('unidad_areas.id', '=', $valor_area)
                ->where('contratos.estado', '=', 'ACTIVO')
                ->get();
            // return $personal_area[0]->pagos->where('mes','=',$valor_mes)
            //                                 ->where('anio','=',$valor_anio)
            //                                 ->first();

            // 2) obtener los registros de pago y realizar los calculos respectivos
            $afps = Tasa::where('name', '=', 'AFPS')->get()->first();
            $comision_afps = Tasa::where('name', '=', 'COMISION AFPS')->get()->first();
            $fondo_solidario = Tasa::where('name', '=', 'FONDO SOLIDARIO')->get()->first();
            $riesgo_comun = Tasa::where('name', '=', 'RIESGO COMUN')->get()->first();

            $array_pagos = [];
            $total_extra_horas = [];
            $total_extra_otros = [];
            $valor_afps = [];
            $valor_comision = [];
            $valor_fondo = [];
            $valor_riesgo = [];
            $total_descuento_anticipos = [];
            $total_descuento_otros = [];
            $total_ingresos = [];
            $total_descuentos = [];
            $total_liquido = [];
            foreach ($personal_area as $personalarea) {

                $tipo_contrato = $personalarea->contratos->where("estado", "=", "ACTIVO")->first();
                $pagos = $personalarea->pagos->where('mes', '=', $valor_mes)
                    ->where('anio', '=', $valor_anio)->first();

                if ($pagos) {
                    $array_pagos[$personalarea->id] = $pagos->dias_trabajado;
                } else {
                    $array_pagos[$personalarea->id] = 0;
                }

                $valor_afps[$personalarea->id] = $personalarea->salario * $afps->valor;
                $valor_comision[$personalarea->id] = $personalarea->salario * $comision_afps->valor;
                $valor_fondo[$personalarea->id] = $personalarea->salario * $fondo_solidario->valor;
                $valor_riesgo[$personalarea->id] = $personalarea->salario * $riesgo_comun->valor;

                $valor_afps[$personalarea->id] = number_format($valor_afps[$personalarea->id], 2, '.', '');
                $valor_comision[$personalarea->id] = number_format($valor_comision[$personalarea->id], 2, '.', '');
                $valor_fondo[$personalarea->id] = number_format($valor_fondo[$personalarea->id], 2, '.', '');
                $valor_riesgo[$personalarea->id] = number_format($valor_riesgo[$personalarea->id], 2, '.', '');

                if ($tipo_contrato->tipo_contrato == "POR CONTRATO" || $tipo_contrato->tipo_contrato == "EVENTUAL") {
                    $valor_afps[$personalarea->id] = number_format(0.00, 2, '.', '');
                    $valor_comision[$personalarea->id] = number_format(0.00, 2, '.', '');
                    $valor_fondo[$personalarea->id] = number_format(0.00, 2, '.', '');
                    $valor_riesgo[$personalarea->id] = number_format(0.00, 2, '.', '');
                }

                //PAGOS EXTRAS
                // horas extra
                $pagos_extra_horas = PagosExtra::where('mes', '=', $valor_mes)
                    ->where('anio', '=', $valor_anio)
                    ->where('tipo_pago', '=', 'HORAS EXTRAS')
                    ->where('personals_id', '=', $personalarea->id)
                    ->get();

                $total_extra_horas[$personalarea->id] = 0.00;
                foreach ($pagos_extra_horas as $pago_extra_hora) {
                    $total_extra_horas[$personalarea->id] = $total_extra_horas[$personalarea->id] + $pago_extra_hora->monto;
                }
                $total_extra_horas[$personalarea->id] = number_format($total_extra_horas[$personalarea->id], 2, '.', '');

                // otros
                $pagos_extra_otros = PagosExtra::where('mes', '=', $valor_mes)
                    ->where('anio', '=', $valor_anio)
                    ->where('tipo_pago', '=', 'OTROS')
                    ->where('personals_id', '=', $personalarea->id)
                    ->get();

                $total_extra_otros[$personalarea->id] = 0.00;
                foreach ($pagos_extra_otros as $pago_extra_otro) {
                    $total_extra_otros[$personalarea->id] = $total_extra_otros[$personalarea->id] + $pago_extra_otro->monto;
                }
                $total_extra_otros[$personalarea->id] = number_format($total_extra_otros[$personalarea->id], 2, '.', '');

                //DESCUENTOS
                // anticipos
                $descuentos_antipos = Descuento::where('mes', '=', $valor_mes)
                    ->where('anio', '=', $valor_anio)
                    ->where('tipo_descuento', '=', 'ANTICIPOS')
                    ->where('personals_id', '=', $personalarea->id)
                    ->get();

                $total_descuento_anticipos[$personalarea->id] = 0.00;
                foreach ($descuentos_antipos as $descuento_anticipo) {
                    $total_descuento_anticipos[$personalarea->id] = $total_descuento_anticipos[$personalarea->id] + $descuento_anticipo->monto;
                }
                $total_descuento_anticipos[$personalarea->id] = number_format($total_descuento_anticipos[$personalarea->id], 2, '.', '');

                // otros
                $descuentos_otros = Descuento::where('mes', '=', $valor_mes)
                    ->where('anio', '=', $valor_anio)
                    ->where('tipo_descuento', '=', 'OTROS')
                    ->where('personals_id', '=', $personalarea->id)
                    ->get();

                $total_descuento_otros[$personalarea->id] = 0.00;
                foreach ($descuentos_otros as $descuento_otro) {
                    $total_descuento_otros[$personalarea->id] = $total_descuento_otros[$personalarea->id] + $descuento_otro->monto;
                }
                $total_descuento_otros[$personalarea->id] = number_format($total_descuento_otros[$personalarea->id], 2, '.', '');

                // TOTAL INGRESOS
                $total_ingresos[$personalarea->id] = $personalarea->salario + $total_extra_horas[$personalarea->id] + $total_extra_otros[$personalarea->id];
                $total_ingresos[$personalarea->id] = number_format($total_ingresos[$personalarea->id], 2, '.', '');

                // TOTAL DESCUENTOS
                $total_descuentos[$personalarea->id] = $valor_afps[$personalarea->id] + $valor_comision[$personalarea->id] + $valor_fondo[$personalarea->id] + $valor_riesgo[$personalarea->id] + $total_descuento_anticipos[$personalarea->id] + $total_descuento_otros[$personalarea->id];
                $total_descuentos[$personalarea->id] = number_format($total_descuentos[$personalarea->id], 2, '.', '');

                // LIQUIDO PAGABLE
                $total_liquido[$personalarea->id] = $total_ingresos[$personalarea->id] - $total_descuentos[$personalarea->id];
                $total_liquido[$personalarea->id] = number_format($total_liquido[$personalarea->id], 2, '.', '');
            } //fin foreach $personal_area

            // pasar las variables calculadas en compact()

            $cargos = Cargo::get();
            foreach ($cargos as $cargo) {
                $array_cargos[$cargo->id] = $cargo->name;
            }


            $pdf = PDF::loadView(
                'reportes.planillas',
                compact(
                    'areas',
                    'empresa',
                    'sw',
                    'array_mes_pdf',
                    'array_pagos',
                    'valor_area',
                    'valor_mes',
                    'valor_anio',
                    'array_cargos',
                    'personal_area',
                    'total_extra_horas',
                    'total_extra_otros',
                    'valor_afps',
                    'valor_comision',
                    'valor_fondo',
                    'valor_riesgo',
                    'total_descuento_anticipos',
                    'total_descuento_otros',
                    'total_ingresos',
                    'total_descuentos',
                    'total_liquido',
                    "afps",
                    "comision_afps",
                    "fondo_solidario",
                    "riesgo_comun",
                )
            )
                ->setPaper('legal', 'landscape');

            $areas = UnidadArea::get();
            foreach ($areas as $area) {
                $array_area_pdf[$area->id] = $area->name;
            }

            return $pdf->stream('Planilla ' . $array_area_pdf[$valor_area]);
        } //FIN SW2
    }

    public function contratos(Request $request)
    {

        $empresa = Empresa::first();

        switch ($request->contrato) {
            case 'TODOS':
                $contratos = Contratos::where('estado', '=', 'ACTIVO')->get();
                break;
            case 'DE PLANTA':
                $contratos = Contratos::where('estado', '=', 'ACTIVO')
                    ->where('tipo_contrato', '=', $request->contrato)->get();
                break;
            case 'POR CONTRATO':
                $contratos = Contratos::where('estado', '=', 'ACTIVO')
                    ->where('tipo_contrato', '=', $request->contrato)->get();
                break;
            case 'EVENTUAL':
                $contratos = Contratos::where('estado', '=', 'ACTIVO')
                    ->where('tipo_contrato', '=', $request->contrato)->get();
                break;
            default:
                return redirect()->route('reportes.index');
                break;
        }

        $cargos = Cargo::get();
        foreach ($cargos as $cargo) {
            $array_cargos[$cargo->id] = $cargo->name;
        }
        $areas = UnidadArea::get();
        $array_areas = ['' => '- Seleccione la unidad/área -', 'todos' => 'TODOS'];
        foreach ($areas as $area) {
            $array_areas[$area->id] = $area->name;
        }

        $pdf = PDF::loadView(
            'reportes.por_contratos',
            compact('empresa', 'contratos', 'array_cargos', 'array_areas')
        );

        return $pdf->stream('Reporte');
    }
}
