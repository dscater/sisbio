<?php

namespace sisbio\Http\Controllers;

use sisbio\Personal;
use Illuminate\Http\Request;

use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use sisbio\Asistencia;
use sisbio\PagosExtra;
use sisbio\Descuento;

use sisbio\UnidadArea;
use sisbio\Cargo;
use Maatwebsite\Excel\Facades\Excel;

use sisbio\Exports\PersonalExport;
use sisbio\RegistroLog;
use sisbio\tad_php_master\lib\TADFactory;
use sisbio\tad_php_master\lib\TAD;
use sisbio\tad_php_master\lib\TADResponse;
use sisbio\tad_php_master\lib\Providers\TADSoap;
use sisbio\tad_php_master\lib\Providers\TADZKLib;
use sisbio\tad_php_master\lib\Exceptions\ConnectionError;
use sisbio\tad_php_master\lib\Exceptions\FilterArgumentError;
use sisbio\tad_php_master\lib\Exceptions\UnrecognizedArgument;
use sisbio\tad_php_master\lib\Exceptions\UnrecognizedCommand;

use sisbio\Zklib\ZKLibrary1\ZKLibrary;

class PersonalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $empresa = Empresa::get()->first();

    if ($request->ajax()) {
      $nombre = $request->get('nombre');
      $apellido = $request->get('apellido');
      $personals = Personal::where('name', 'LIKE', "%$nombre%")
        ->where('apep', 'LIKE', "%$apellido%")
        ->orderBy('apep', 'ASC')
        ->paginate();
      return response()->JSON(view('personals.parcial.tablaPersonals', compact('personals', 'empresa'))->render());
    }

    $personals = Personal::orderBy('apep', 'ASC')->paginate();
    return view('personals.index', compact('personals', 'empresa'));
  }

  public function identifica(Request $request)
  {
    if ($request->ajax()) {
      $tipo = $request->tipo;
      $nombre = $request->get('nombre');
      $apellido = $request->get('apellido');
      $personals = Personal::where('name', 'LIKE', "%$nombre%")
        ->where('apep', 'LIKE', "%$apellido%")
        ->orderBy('apep', 'ASC')
        ->paginate(5);
      return response()->JSON(view('personals.parcial.tablaPersonals_identificado', compact('personals', 'tipo'))->render());
    }
  }


  public function datos_pago(Request $request, $id)
  {
    $personal = Personal::find($id);
    if ($request->ajax()) {
      $mes = $request->get('mes');
      $anio = $request->get('anio');

      $fecha_like = $anio . '-' . $mes;

      $asistencias = Asistencia::where('fecha', 'LIKE', "$fecha_like%")
        ->where('estado', '=', 'ASISTIÓ')
        ->where('personals_id', '=', $id)
        ->get();

      $pagos_extra_horas = PagosExtra::where('mes', '=', $mes)
        ->where('anio', '=', $anio)
        ->where('personals_id', '=', $id)
        ->where('tipo_pago', '=', 'HORAS EXTRAS')
        ->get();

      $pagos_extra_otros = PagosExtra::where('mes', '=', $mes)
        ->where('anio', '=', $anio)
        ->where('personals_id', '=', $id)
        ->where('tipo_pago', '=', 'OTROS')
        ->get();

      $descuentos_anticipos = Descuento::where('mes', '=', $mes)
        ->where('anio', '=', $anio)
        ->where('personals_id', '=', $id)
        ->where('tipo_descuento', '=', 'ANTICIPOS')
        ->get();

      $descuentos_otros = Descuento::where('mes', '=', $mes)
        ->where('anio', '=', $anio)
        ->where('personals_id', '=', $id)
        ->where('tipo_descuento', '=', 'OTROS')
        ->get();

      if (count($pagos_extra_horas)) {
        $monto_pago_extra_horas = 0;
        foreach ($pagos_extra_horas as $pago_extra_hora) {
          $monto_pago_extra_horas = $monto_pago_extra_horas + $pago_extra_hora->monto;
        }
      } else {
        $monto_pago_extra_horas = 0;
      }

      if (count($pagos_extra_otros)) {
        $monto_pago_extra_otros = 0;
        foreach ($pagos_extra_otros as $pago_extra_otro) {
          $monto_pago_extra_otros = $monto_pago_extra_otros + $pago_extra_otro->monto;
        }
      } else {
        $monto_pago_extra_otros = 0;
      }

      if (count($descuentos_anticipos)) {
        $monto_descuento_anticipo = 0;
        foreach ($descuentos_anticipos as $descuento_anticipo) {
          $monto_descuento_anticipo = $monto_descuento_anticipo + $descuento_anticipo->monto;
        }
      } else {
        $monto_descuento_anticipo = 0;
      }

      if (count($descuentos_otros)) {
        $monto_descuento_otro = 0;
        foreach ($descuentos_otros as $descuento_otro) {
          $monto_descuento_otro = $monto_descuento_otro + $descuento_otro->monto;
        }
      } else {
        $monto_descuento_otro = 0;
      }

      if (count($asistencias)) {
        $num_asistencias = count($asistencias);
      } else {
        $num_asistencias = 0;
      }

      $tipo_contrato = $personal->contratos->where("estado", "=", "ACTIVO")->first();


      return response()->json([
        'dias_trabajados' => $num_asistencias,
        'monto_pago_extra_horas' => $monto_pago_extra_horas,
        'monto_pago_extra_otros' => $monto_pago_extra_otros,
        'monto_descuento_anticipo' => $monto_descuento_anticipo,
        'monto_descuento_otro' => $monto_descuento_otro,
        'fecha_like' => $fecha_like,
        'tipo_contrato' => $tipo_contrato->tipo_contrato
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $empresa = Empresa::get()->first();
    return view('personals.create', compact('empresa'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $personal = new Personal(array_map('mb_strtoupper', $request->except('foto')));

    $file = $request->file('foto');
    $nombre_foto = time() . $personal->name . $personal->apep . '.png';

    $file->move(public_path() . '/imgs/', $nombre_foto);

    $personal->foto = $nombre_foto;

    $personal->save();
    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "PERSONAL",
      "accion" => "REGISTRO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " REGISTRO UN PERSONAL",
    ]);

    return redirect()->route('personals.edit', $personal->id)
      ->with('msg', '
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times</button>
          <strong>Personal registrado con éxito.</strong>
        </div>
        ');
  }

  /**
   * Display the specified resource.
   *
   * @param  \sisbio\Personal  $personal
   * @return \Illuminate\Http\Response
   */
  public function show(Personal $personal)
  {
    $empresa = Empresa::get()->first();
    return view('personals.show', compact('personal', 'empresa'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \sisbio\Personal  $personal
   * @return \Illuminate\Http\Response
   */
  public function edit(Personal $personal)
  {
    $empresa = Empresa::get()->first();
    return view('personals.edit', compact('personal', 'empresa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \sisbio\Personal  $personal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Personal $personal)
  {
    $personal->update(array_map('mb_strtoupper', $request->except('foto')));

    if ($request->hasFile('foto')) {
      $foto_antigua = public_path() . '/imgs/' . $personal->foto;
      \File::delete($foto_antigua);

      $file = $request->file('foto');
      $nombre_foto = time() . $personal->name . $personal->apep . '.png';

      $file->move(public_path() . '/imgs/', $nombre_foto);

      $personal->foto = $nombre_foto;

      $personal->save();
    }
    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "PERSONAL",
      "accion" => "ACTUALIZO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ACTUALIZO UN PERSONAL",
    ]);


    return redirect()->route('personals.edit', $personal->id)
      ->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times</button>
        <strong>Datos de personal actualizado con éxito.</strong>
      </div>
      ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \sisbio\Personal  $personal
   * @return \Illuminate\Http\Response
   */
  public function destroy(Personal $personal)
  {
    $foto_antigua = public_path() . '/imgs/' . $personal->foto;
    \File::delete($foto_antigua);

    if ($personal->apem != "") {
      $nombre = $personal->apep . ' ' . $personal->apem . ' ' . $personal->name;
    } else {
      $nombre = $personal->apep . ' ' . $personal->name;
    }

    $personal->delete();
    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "PERSONAL",
      "accion" => "ELIMINO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ELIMINO UN PERSONAL",
    ]);

    return redirect()->route('personals.index')
      ->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times</button>
        <strong>El personal ' . $nombre . ' ha sido eliminado con éxito.</strong>
      </div>
      ');
  }

  public function pdf_personal(Personal $personal)
  {
    $empresa = Empresa::get()->first();
    // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

    // landscape -> horizontal || portrait -> vertical
    $pdf = PDF::loadView('personals.pdf.personal_pdf', compact('personal', 'empresa'))->setPaper('a4');
    return $pdf->stream('FormularioDeRegistro.pdf');
  }

  public function curriculum(Personal $personal)
  {
    $empresa = Empresa::get()->first();

    $formacions = $personal->formacion;
    $especializacions = $personal->especializacion;
    $experiencias = $personal->experiencia;

    // landscape -> horizontal || portrait -> vertical
    $pdf = PDF::loadView('personals.pdf.curriculum', compact(
      'personal',
      'formacions',
      'especializacions',
      'experiencias',
      'empresa'
    ))->setPaper('a4');
    return $pdf->stream('Curriculum-' . $personal->name . '_' . $personal->apep);
  }

  public function historia(Personal $personal)
  {
    $empresa = Empresa::get()->first();

    $contratos = $personal->contratos;

    $areas = UnidadArea::all();
    $cargos = Cargo::all();

    foreach ($areas as $area) {
      $array_area[$area->id] = $area->name;
    }

    foreach ($cargos as $cargo) {
      $array_cargo[$cargo->id] = $cargo->name;
    }

    // landscape -> horizontal || portrait -> vertical
    $pdf = PDF::loadView('personals.pdf.historia', compact('personal', 'contratos', 'empresa', 'array_area', 'array_cargo'))->setPaper('a4');
    return $pdf->stream('Historia-' . $personal->name . '_' . $personal->apep);
  }

  public function config_personal()
  {

    return Excel::download(new PersonalExport, 'personal.xls');
  }

  public function DatosBiometrico()
  {
    $zk = new ZKLibrary('192.168.1.201', 4370);

    // $tad = (new TADFactory(['ip'=>'192.168.1.201']))->get_instance();
    //
    // $commands_list = TAD::commands_available();

    dd($users = $zk->getUser());
  }
}
