<?php

namespace sisbio\Http\Controllers;

use sisbio\ExperienciaPersonal;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use sisbio\RegistroLog;

class ExperienciaPersonalController extends Controller
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

    if ($request->ajax()) {
      $empresa_exp = $request->get('empresa_exp');
      $experiencias = ExperienciaPersonal::where('empresa', 'LIKE', "%$empresa_exp%")
        ->where('personals_id', '=', $id)
        ->paginate(10);
      return response()->JSON(view('experiencias.parcial.tabla_experiencias', compact('experiencias', 'id', 'empresa', 'personal'))->render());
    }

    $experiencias = ExperienciaPersonal::where('personals_id', '=', $id)->paginate(10);

    return view('experiencias.index', compact('experiencias', 'id', 'empresa', 'personal'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $empresa = Empresa::get()->first();

    return view('experiencias.create', compact('id', 'empresa'));
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

    $experiencia = new ExperienciaPersonal(array_map('mb_strtoupper', $request->all()));

    $personal->experiencia()->save($experiencia);


    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "EXPERIENCIA DE PERSONAL",
      "accion" => "REGISTRO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " REGISTRO UNA EXPERIENCIA DE PERSONAL",
    ]);

    return redirect()->route('experiencias.edit', $experiencia->id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Experiencia del personal <strong>' . $personal->name . ' ' . $personal->apep . '</strong> registrado con éxito.
      </div>
      ');
  }

  /**
   * Display the specified resource.
   *
   * @param  \sisbio\ExperienciaPersonal  $experiencia
   * @return \Illuminate\Http\Response
   */
  public function show(ExperienciaPersonal $experiencia)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \sisbio\ExperienciaPersonal  $experiencia
   * @return \Illuminate\Http\Response
   */
  public function edit(ExperienciaPersonal $experiencia)
  {
    $empresa = Empresa::get()->first();

    return view('experiencias.edit', compact('experiencia', 'empresa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \sisbio\ExperienciaPersonal  $experiencia
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ExperienciaPersonal $experiencia)
  {
    $experiencia->update(array_map('mb_strtoupper', $request->all()));
    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "EXPERIENCIA DE PERSONAL",
      "accion" => "ACTUALIZO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ACTUALIZO UNA EXPERIENCIA DE PERSONAL",
    ]);
    return redirect()->route('experiencias.edit', $experiencia->id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Experiencia del personal <strong>' . $experiencia->personal->name . ' ' . $experiencia->personal->apep . '</strong> actualizado con éxito.
      </div>
      ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \sisbio\ExperienciaPersonal  $experiencia
   * @return \Illuminate\Http\Response
   */
  public function destroy(ExperienciaPersonal $experiencia)
  {
    $id = $experiencia->personals_id;

    $experiencia->delete();

    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "EXPERIENCIA DE PERSONAL",
      "accion" => "ELIMINO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ELIMINO UNA EXPERIENCIA DE PERSONAL",
    ]);

    return redirect()->route('experiencias.index', $id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Experiencia eliminado con éxito.</strong>
      </div>
      ');
  }

  public function pdf_experiencia($id)
  {
    $empresa = Empresa::get()->first();

    $personal = Personal::find($id);
    $experiencias = ExperienciaPersonal::where('personals_id', '=', $id)->get();

    // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

    $pdf = PDF::loadView('experiencias.pdf.pdf_experiencia', compact('experiencias', 'personal', 'empresa'));
    return $pdf->stream('Especializacion_Personal.pdf');
  }
}
