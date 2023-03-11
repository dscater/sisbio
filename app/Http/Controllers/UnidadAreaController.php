<?php

namespace sisbio\Http\Controllers;

use sisbio\UnidadArea;
use Illuminate\Http\Request;

use sisbio\Empresa;

class UnidadAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empresa = Empresa::get()->first();

        if($request->ajax())
        {
          $area = $request->get('area');
          $areas = UnidadArea::where('name','LIKE',"%$area%")->paginate();
          return response()->JSON(view('areas.parcial.tablaAreas', compact('areas','empresa'))->render());
        }

        $areas = UnidadArea::paginate();
        return view('areas.index', compact('areas','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $empresa = Empresa::get()->first();
      return view('areas.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_comprobar = UnidadArea::where('name','=',$request->input('name'))->get()->first();
        if($nombre_comprobar)
        {
          return redirect()->route('areas.create')->with('msg',
          '<div class="alert alert-warning">
            El área / unidad con el nombre <strong>'.$request->input('name').'</strong> ya existe.
          </div>'
          );
        }

        $area = UnidadArea::create(array_map('mb_strtoupper',$request->all()));

        return redirect()->route('areas.edit',$area->id)
        ->with('msg','
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Área / Unidad creado con éxito.</strong>
        </div>
        ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisbio\UnidadArea  $unidadArea
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadArea $area)
    {
      $empresa = Empresa::get()->first();
      return view('areas.show', compact('area','empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\UnidadArea  $unidadArea
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadArea $area)
    {
        $empresa = Empresa::get()->first();
        return view('areas.edit', compact('area','empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\UnidadArea  $unidadArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnidadArea $area)
    {
      $area->update(array_map('mb_strtoupper',$request->all()));
      return redirect()->route('areas.edit',$area->id)->with('msg',
      '<div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Área / Unidad actualizado con éxito</strong>
      </div>'
      );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\UnidadArea  $unidadArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadArea $area)
    {
        $area->delete();
        return redirect()->route('areas.index')->with('msg',
        '<div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Área / Unidad eliminado con éxito</strong>
        </div>'
        );
    }
}
