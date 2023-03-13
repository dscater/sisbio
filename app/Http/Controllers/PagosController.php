<?php

namespace sisbio\Http\Controllers;

use sisbio\Pagos;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use sisbio\Tasa;
use sisbio\PagosExtra;
use sisbio\Descuento;
use sisbio\Contratos;
use sisbio\Cargo;
use sisbio\UnidadArea;

use Illuminate\Support\Facades\DB;
use sisbio\RegistroLog;

class PagosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index(Request $request, $id)
  {
    $empresa = Empresa::get()->first();
    $personal = Personal::find($id);

    $array_mes = [
      '' => '- Mes (Todos) -',
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

    if ($request->ajax()) {
      $anio = $request->get('anio');
      $mes = $request->get('mes');
      $pagos = Pagos::where('anio', 'LIKE', "%$anio%")
        ->where('mes', 'LIKE', "%$mes%")
        ->where('personals_id', '=', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

      return response()->JSON(view('pagos.parcial.tabla_pagos', compact('pagos', 'id', 'empresa', 'personal', 'array_mes'))->render());
    }

    $anio_actual = date('Y');

    $anio_comienzo = $anio_actual - 5;

    $array_anios = ['' => '- Año (Todos) -'];

    for ($i = 1; $i <= 8; $i++) {
      $array_anios[$anio_comienzo + $i] = $anio_comienzo + $i;
    }

    $pagos = Pagos::where('personals_id', '=', $id)
      ->orderBy('created_at', 'desc')->paginate(10);

    return view('pagos.index', compact('pagos', 'id', 'empresa', 'personal', 'array_mes', 'array_anios'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $personal = Personal::find($id);

    $empresa = Empresa::get()->first();

    $anio_actual = date('Y');
    $mes_actual = date('m');

    $array_mes = [
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

    $array_anios = ['' => '- Año -'];

    for ($i = 1; $i <= 8; $i++) {
      $array_anios[$anio_comienzo + $i] = $anio_comienzo + $i;
    }

    $afps = Tasa::where('name', '=', 'AFPS')->get()->first();
    $comision_afps = Tasa::where('name', '=', 'COMISION AFPS')->get()->first();
    $fondo_solidario = Tasa::where('name', '=', 'FONDO SOLIDARIO')->get()->first();
    $riesgo_comun = Tasa::where('name', '=', 'RIESGO COMUN')->get()->first();

    // VARIABLES NECESARIAS PARA EL PAGO
    $contrato = $personal->contratos->where('estado', '=', 'ACTIVO')->first();

    if (empty($contrato)) {
      return view('pagos.sin_contrato', compact('id', 'personal', 'empresa'));
    } else {
      return view('pagos.create', compact(
        'id',
        'personal',
        'array_anios',
        'anio_actual',
        'array_mes',
        'mes_actual',
        'empresa',
        'contrato',
        'afps',
        'comision_afps',
        'fondo_solidario',
        'riesgo_comun'
      ));
    }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {
    $personal = Personal::find($id);

    $pago = new Pagos(array_map('mb_strtoupper', $request->all()));

    $personal->pagos()->save($pago);

    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "PAGOS",
      "accion" => "REGISTRO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " REGISTRO UN PAGO",
    ]);

    return redirect()->route('pagos.index', $pago->personals_id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Pago del personal <strong>' . $personal->name . ' ' . $personal->apep . '</strong> registrado con éxito.
      </div>
      ');
  }

  /**
   * Display the specified resource.
   *
   * @param  \sisbio\Pagos  $pagos
   * @return \Illuminate\Http\Response
   */
  public function show(Pagos $pago)
  {
    $empresa = Empresa::get()->first();

    $anio_actual = date('Y');
    $mes_actual = date('m');

    $array_mes = [
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

    $array_anios = ['' => '- Año -'];

    for ($i = 1; $i <= 8; $i++) {
      $array_anios[$anio_comienzo + $i] = $anio_comienzo + $i;
    }

    return view('pagos.show', compact('pago', 'empresa', 'array_mes', 'array_anios', 'anio_actual'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \sisbio\Pagos  $pagos
   * @return \Illuminate\Http\Response
   */
  public function edit(Pagos $pago)
  {
    $empresa = Empresa::get()->first();

    $anio_actual = date('Y');
    $mes_actual = date('m');

    $array_mes = [
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

    $array_anios = ['' => '- Año -'];

    for ($i = 1; $i <= 8; $i++) {
      $array_anios[$anio_comienzo + $i] = $anio_comienzo + $i;
    }

    return view('pagos.edit', compact('pago', 'empresa', 'array_mes', 'array_anios', 'anio_actual'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \sisbio\Pagos  $pagos
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pagos $pago)
  {
    $pago->update(array_map('mb_strtoupper', $request->all()));
    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "PAGOS",
      "accion" => "ACTUALIZO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ACTUALIZO UN PAGO",
    ]);
    return redirect()->route('pagos.edit', $pago->id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Pagos del personal <strong>' . $pago->personal->name . ' ' . $pago->personal->apep . '</strong> actualizado con éxito.
      </div>
      ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \sisbio\Pagos  $pagos
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pagos $pago)
  {
    $id = $pago->personals_id;

    $pago->delete();

    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "PAGOS",
      "accion" => "ELIMINO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ELIMINO UN PAGO",
    ]);
    return redirect()->route('pagos.index', $id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Pagos eliminado con éxito.</strong>
      </div>
      ');
  }

  public function pdf_pagos($id)
  {
    $empresa = Empresa::get()->first();

    $personal = Personal::find($id);
    $pagos = Pagos::where('personals_id', '=', $id)
      ->orderBy('created_at', 'desc')->get();

    // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

    $pdf = PDF::loadView('pagos.pdf.pdf_pagos_extra', compact('pagos', 'personal', 'empresa'));
    return $pdf->stream('Pagos_Persona.pdf');
  }

  public function boleta_pago($id, $mes, $anio)
  {
    $empresa = Empresa::get()->first();

    $personal = Personal::find($id);
    $empresa = Empresa::get()->first();
    // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

    $afps = Tasa::where('name', '=', 'AFPS')->get()->first();
    $comision_afps = Tasa::where('name', '=', 'COMISION AFPS')->get()->first();
    $fondo_solidario = Tasa::where('name', '=', 'FONDO SOLIDARIO')->get()->first();
    $riesgo_comun = Tasa::where('name', '=', 'RIESGO COMUN')->get()->first();

    // VARIABLES NECESARIAS PARA EL PAGO
    $contrato = $personal->contratos->where('estado', '=', 'ACTIVO')->first();
    $pago = $personal->pagos->where('mes', '=', $mes)
      ->where('anio', '=', $anio)->first();

    // CALCULOS PARA LA BOLETA
    // TASAS DE INTERES
    $afps_porcent = $afps->valor * 100;
    $comision_afps_porcent = $comision_afps->valor * 100;
    $fondo_solidario_porcent = $fondo_solidario->valor * 100;
    $riesgo_comun_porcent = $riesgo_comun->valor * 100;

    // afps
    $afps = $afps->valor;
    $afps = $contrato->salario * $afps;
    $afps = number_format($afps, 2, '.', '');

    // comision afps
    $comision_afps = $comision_afps->valor;
    $comision_afps = $contrato->salario * $comision_afps;
    $comision_afps = number_format($comision_afps, 2, '.', '');

    // fondo solidario
    $fondo_solidario = $fondo_solidario->valor;
    $fondo_solidario = $contrato->salario * $fondo_solidario;
    $fondo_solidario = number_format($fondo_solidario, 2, '.', '');

    // riesgo comun
    $riesgo_comun = $riesgo_comun->valor;
    $riesgo_comun = $contrato->salario * $riesgo_comun;
    $riesgo_comun = number_format($riesgo_comun, 2, '.', '');


    if ($contrato->tipo_contrato == "POR CONTRATO" || $contrato->tipo_contrato == "EVENTUAL") {
      $afps = "0.00";
      $comision_afps = "0.00";
      $fondo_solidario = "0.00";
      $riesgo_comun = "0.00";
    }

    //PAGOS EXTRAS
    // horas extra
    $pagos_extra_horas = PagosExtra::where('mes', '=', $mes)
      ->where('anio', '=', $anio)
      ->where('tipo_pago', '=', 'HORAS EXTRAS')
      ->where('personals_id', '=', $id)
      ->get();

    $total_extra_horas = 0.00;
    foreach ($pagos_extra_horas as $pago_extra_hora) {
      $total_extra_horas = $total_extra_horas + $pago_extra_hora->monto;
    }
    $total_extra_horas = number_format($total_extra_horas, 2, '.', '');

    // otros
    $pagos_extra_otros = PagosExtra::where('mes', '=', $mes)
      ->where('anio', '=', $anio)
      ->where('tipo_pago', '=', 'OTROS')
      ->where('personals_id', '=', $id)
      ->get();

    $total_extra_otros = 0.00;
    foreach ($pagos_extra_otros as $pago_extra_otro) {
      $total_extra_otros = $total_extra_otros + $pago_extra_otro->monto;
    }
    $total_extra_otros = number_format($total_extra_otros, 2, '.', '');

    //DESCUENTOS
    // anticipos
    $descuentos_antipos = Descuento::where('mes', '=', $mes)
      ->where('anio', '=', $anio)
      ->where('tipo_descuento', '=', 'ANTICIPOS')
      ->where('personals_id', '=', $id)
      ->get();

    $total_descuento_anticipos = 0.00;
    foreach ($descuentos_antipos as $descuento_anticipo) {
      $total_descuento_anticipos = $total_descuento_anticipos + $descuento_anticipo->monto;
    }
    $total_descuento_anticipos = number_format($total_descuento_anticipos, 2, '.', '');

    // otros
    $descuentos_otros = Descuento::where('mes', '=', $mes)
      ->where('anio', '=', $anio)
      ->where('tipo_descuento', '=', 'OTROS')
      ->where('personals_id', '=', $id)
      ->get();

    $total_descuento_otros = 0.00;
    foreach ($descuentos_otros as $descuento_otro) {
      $total_descuento_otros = $total_descuento_otros + $descuento_otro->monto;
    }
    $total_descuento_otros = number_format($total_descuento_otros, 2, '.', '');

    // TOTAL INGRESOS
    $total_ingresos = $contrato->salario + $total_extra_horas + $total_extra_otros;
    $total_ingresos = number_format($total_ingresos, 2, '.', '');

    // TOTAL DESCUENTOS
    $total_descuentos = $afps + $comision_afps + $fondo_solidario + $riesgo_comun + $total_descuento_anticipos + $total_descuento_otros;
    $total_descuentos = number_format($total_descuentos, 2, '.', '');

    // LIQUIDO PAGABLE
    $total_liquido = $total_ingresos - $total_descuentos;
    $total_liquido = number_format($total_liquido, 2, '.', '');

    $cargos = Cargo::all();
    foreach ($cargos as $key => $value) {
      $array_cargos[$value->id] = $value->name;
    }

    $areas = UnidadArea::all();
    foreach ($areas as $key => $value) {
      $array_areas[$value->id] = $value->name;
    }

    // OBTENER LOS DIAS TRABAJADOS
    $numDiasTrabajados = DB::select("SELECT COUNT(*) as dias_trabajados FROM asistencias WHERE personals_id = $id AND fecha LIKE '$anio-$mes%' AND estado = 'ASISTIÓ'")[0]->dias_trabajados;

    $pdf = PDF::loadView(
      'pagos.pdf.boleta_pago',
      compact(
        'personal',
        'empresa',
        'afps',
        'comision_afps',
        'mes',
        'anio',
        'pago',
        'fondo_solidario',
        'riesgo_comun',
        'contrato',
        'array_cargos',
        'array_areas',
        'afps_porcent',
        'comision_afps_porcent',
        'fondo_solidario_porcent',
        'riesgo_comun_porcent',
        'total_extra_horas',
        'total_extra_otros',
        'total_descuento_anticipos',
        'total_descuento_otros',
        'total_ingresos',
        'total_descuentos',
        'total_liquido'
      )
    )
      ->setPaper('a4', 'landscape');
    return $pdf->stream('Personal.pdf');
  }

  public function historia_pagos(Personal $personal)
  {
    $empresa = Empresa::get()->first();

    $array_mes = [
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

    $pagos_personal = Pagos::where('personals_id', '=', $personal->id)->get();

    $contrato = Contratos::where('personals_id', '=', $personal->id)
      ->where('estado', '=', 'ACTIVO')
      ->get()->first();

    $pdf = PDF::loadView('pagos.pdf.historial_pagos', compact('empresa', 'personal', 'pagos_personal', 'contrato', 'array_mes'))
      ->setPaper('a4', 'portrait');
    return $pdf->stream('HistorialDePago' . $personal->name . ' ' . $personal->apep);
  }
}
