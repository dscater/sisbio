<?php

namespace sisbio\Http\Controllers;

use sisbio\Horario;
use Illuminate\Http\Request;

use sisbio\Empresa;
use sisbio\UnidadArea;
use sisbio\Personal;

use Maatwebsite\Excel\Facades\Excel;

use sisbio\Exports\HorariosExport;

class HorarioController extends Controller
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
      $area = $request->get('area');
      $areas = UnidadArea::where('name', 'LIKE', "%$area%")
        ->paginate();
      return response()->JSON(view('horarios.parcial.tabla_horario', compact('areas', 'empresa'))->render());
    }

    $areas = UnidadArea::paginate();

    return view('horarios.index', compact('areas', 'empresa'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(UnidadArea $area)
  {
    $empresa = Empresa::get()->first();

    return view('horarios.create', compact('area', 'empresa'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, UnidadArea $area)
  {
    $horario = new Horario(array_map('mb_strtoupper', $request->all()));

    $area->horario()->save($horario);

    return redirect()->route('horarios.edit', $horario->id)->with(
      'msg',
      '<div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times</button>
        Horario del área/unidad <strong>' . $area->name . '</strong> configurado con éxito
      </div>'
    );
  }

  /**
   * Display the specified resource.
   *
   * @param  \sisbio\Horario  $horario
   * @return \Illuminate\Http\Response
   */
  public function show(Horario $horario)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \sisbio\Horario  $horario
   * @return \Illuminate\Http\Response
   */
  public function edit(Horario $horario)
  {
    $empresa = Empresa::get()->first();
    $area = $horario->area;
    return view('horarios.edit', compact('horario', 'area', 'empresa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \sisbio\Horario  $horario
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Horario $horario)
  {
    $horario->update(array_map('mb_strtoupper', $request->all()));

    $area = $horario->area;

    return redirect()->route('horarios.edit', $horario->id)->with(
      'msg',
      '<div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times</button>
        Horario del área/unidad <strong>' . $area->name . '</strong> configurado con éxito
      </div>'
    );
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \sisbio\Horario  $horario
   * @return \Illuminate\Http\Response
   */
  public function destroy(Horario $horario)
  {
    //
  }

  public function config()
  {
    return Excel::download(new HorariosExport, 'config_horario.xls');
  }
}
