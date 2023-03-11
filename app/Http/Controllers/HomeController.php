<?php

namespace sisbio\Http\Controllers;

use Illuminate\Http\Request;
use sisbio\Empresa;

use sisbio\Asistencia;
use sisbio\Contratos;
use sisbio\UnidadArea;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $ultima_asistencia = Asistencia::get()->last();

    $contrato = null;
    $contrato_area_horario = null;
    if ($ultima_asistencia) {
      $contrato = Contratos::where('personals_id', '=', $ultima_asistencia->personals_id)
        ->where('estado', '=', 'ACTIVO')
        ->get()->first();
      $contrato_area_horario = $contrato->area->horario;
    }


    $areas = UnidadArea::all();
    foreach ($areas as $area) {
      $array_areas[$area->id] = $area->name;
    }

    $empresa = Empresa::get()->first();
    return view('home', compact('empresa', 'ultima_asistencia', 'contrato', 'array_areas', 'contrato_area_horario'));
  }

  public function asistencias(Request $request)
  {
    if ($request->ajax()) {
      $ultima_actualizacion = Asistencia::max('updated_at');
      $ultima_asistencia = Asistencia::where('updated_at', '=', $ultima_actualizacion)->get()->first();

      $contrato = Contratos::where('personals_id', '=', $ultima_asistencia->personals_id)
        ->where('estado', '=', 'ACTIVO')
        ->get()->first();

      $contrato_area_horario = $contrato->area->horario;

      $areas = UnidadArea::all();
      foreach ($areas as $area) {
        $array_areas[$area->id] = $area->name;
      }

      if ($ultima_asistencia != null) {
        return response()->JSON(view('parcials.asistencias', compact(
          'ultima_asistencia',
          'contrato',
          'array_areas',
          'contrato_area_horario'
        ))->render());
      } else {
        return response()->JSON('NO EXISTEN REGISTROS.');
      }
    }
  }
}
