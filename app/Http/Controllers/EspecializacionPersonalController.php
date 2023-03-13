<?php

namespace sisbio\Http\Controllers;

use sisbio\EspecializacionPersonal;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use sisbio\RegistroLog;

class EspecializacionPersonalController extends Controller
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
      $institucion = $request->get('institucion');
      $especializacions = EspecializacionPersonal::where('institucion', 'LIKE', "%$institucion%")
        ->where('personals_id', '=', $id)
        ->paginate(10);
      return response()->JSON(view('especializacions.parcial.tabla_especializacion', compact('especializacions', 'id', 'empresa', 'personal'))->render());
    }

    $especializacions = EspecializacionPersonal::where('personals_id', '=', $id)->paginate(10);

    return view('especializacions.index', compact('especializacions', 'id', 'empresa', 'personal'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $empresa = Empresa::get()->first();

    return view('especializacions.create', compact('id', 'empresa'));
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

    $especializacion = new EspecializacionPersonal(array_map('mb_strtoupper', $request->except('archivo')));

    $archivo = $request->file('archivo');
    $nombre_archivo = time() . $personal->apep . $personal->name . str_replace(' ', '_', $request->input('institucion')) . '.pdf';
    $archivo->move(public_path() . '/files/', $nombre_archivo);
    $especializacion->archivo = $nombre_archivo;

    $personal->especializacion()->save($especializacion);
    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "ESPECIALIZACIONES",
      "accion" => "REGISTRO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " REGISTRO UNA ESPECIALIZACIÓN",
    ]);

    return redirect()->route('especializacions.edit', $especializacion->id)->with('msg', '
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          Especialización del personal <strong>' . $personal->name . ' ' . $personal->apep . '</strong> registrado con éxito.
        </div>
        ');
  }

  /**
   * Display the specified resource.
   *
   * @param  \sisbio\EspecializacionPersonal  $especializacionPersonal
   * @return \Illuminate\Http\Response
   */
  public function show(EspecializacionPersonal $especializacionPersonal)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \sisbio\EspecializacionPersonal  $especializacionPersonal
   * @return \Illuminate\Http\Response
   */
  public function edit(EspecializacionPersonal $especializacion)
  {
    $empresa = Empresa::get()->first();

    return view('especializacions.edit', compact('especializacion', 'empresa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \sisbio\EspecializacionPersonal  $especializacionPersonal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, EspecializacionPersonal $especializacion)
  {
    $especializacion->update(array_map('mb_strtoupper', $request->except('archivo')));

    $personal = Personal::find($especializacion->personals_id);
    if ($request->hasFile('archivo')) {
      $antiguo_archivo = $especializacion->archivo;
      \File::delete(public_path() . '/files/' . $antiguo_archivo);

      $archivo = $request->file('archivo');
      $nombre_archivo = time() . $personal->apep . $personal->name . str_replace(' ', '_', $request->input('institucion')) . '.pdf';
      $archivo->move(public_path() . '/files/', $nombre_archivo);
      $especializacion->archivo = $nombre_archivo;
      $especializacion->save();
    }

    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "ESPECIALIZACIONES",
      "accion" => "ACTUALIZO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ACTUALIZO UNA ESPECIALIZACIÓN",
    ]);

    return redirect()->route('especializacions.edit', $especializacion->id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Especialización del personal <strong>' . $especializacion->personal->name . ' ' . $especializacion->personal->apep . '</strong> actualizado con éxito.
      </div>
      ');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \sisbio\EspecializacionPersonal  $especializacionPersonal
   * @return \Illuminate\Http\Response
   */
  public function destroy(EspecializacionPersonal $especializacion)
  {
    $id = $especializacion->personals_id;

    $antiguo_archivo = $especializacion->archivo;
    \File::delete(public_path() . '/files/' . $antiguo_archivo);

    $especializacion->delete();

    RegistroLog::create([
      "user_id" => Auth::user()->id,
      "modulo" => "ESPECIALIZACIONES",
      "accion" => "ELIMINO",
      "descripcion" => "EL USUARIO " . Auth::user()->name . " ELIMINO UNA ESPECIALIZACIÓN",
    ]);

    return redirect()->route('especializacions.index', $id)->with('msg', '
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Especialización eliminado con éxito.</strong>
      </div>
      ');
  }

  public function pdf_especializacion($id)
  {
    $empresa = Empresa::get()->first();

    $personal = Personal::find($id);
    $especializacions = EspecializacionPersonal::where('personals_id', '=', $id)->get();

    // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

    $pdf = PDF::loadView('especializacions.pdf.pdf_especializacion', compact('especializacions', 'personal', 'empresa'));
    return $pdf->stream('Especializacion_Personal.pdf');
  }

  public function descargar(EspecializacionPersonal $especializacion)
  {
    return response()->download(public_path('files/' . $especializacion->archivo));
  }
}
