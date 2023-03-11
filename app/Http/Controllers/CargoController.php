<?php

namespace sisbio\Http\Controllers;

use sisbio\Cargo;
use Illuminate\Http\Request;

use sisbio\Empresa;

class CargoController extends Controller
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
        $cargo = $request->get('cargo');
        $cargos = Cargo::where('name','LIKE',"%$cargo%")->paginate();
        return response()->JSON(view('cargos.parcial.tablaCargos',compact('cargos','empresa'))->render());
      }
      $cargos = Cargo::paginate();
      return view('cargos.index',compact('cargos','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $empresa = Empresa::get()->first();
      return view('cargos.create',compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre_comprobar = Cargo::where('name','=',$request->input('name'))->get()->first();
        if($nombre_comprobar)
        {
          return redirect()->route('cargos.create')->with('msg',
          '<div class="alert alert-warning">
            El cargo con el nombre <strong>'.$request->input('name').'</strong> ya existe.
          </div>'
          );
        }

        $cargo = Cargo::create(array_map('mb_strtoupper',$request->all()));

        return redirect()->route('cargos.edit',$cargo->id)->with('msg',
        '<div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Cargo creado con éxito</strong>
        </div>'
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \sisbio\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
      $empresa = Empresa::get()->first();
      return view('cargos.show',compact('cargo','empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
      $empresa = Empresa::get()->first();
      return view('cargos.edit',compact('cargo','empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        $cargo->update(array_map('mb_strtoupper',$request->all()));
        return redirect()->route('cargos.edit',$cargo->id)->with('msg',
        '<div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Cargo actualizado con éxito</strong>
        </div>'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect()->route('cargos.index')->with('msg',
        '<div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Cargo eliminado con éxito</strong>
        </div>'
        );
    }
}
