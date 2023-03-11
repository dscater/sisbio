<?php

namespace sisbio\Http\Controllers;

use sisbio\Contratos;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use sisbio\UnidadArea;
use sisbio\Cargo;

use Barryvdh\DomPDF\Facade as PDF;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
      $empresa = Empresa::get()->first();
      $personal=Personal::find($id);

      if($request->ajax())
      {
        $fech_ingreso = $request->get('fech_ingreso');
        $fech_retiro = $request->get('fech_retiro');
        $contratos = Contratos::where('fech_ingreso','LIKE',"%$fech_ingreso%")
                                ->where('fech_retiro','LIKE',"%$fech_retiro%")
                                ->where('personals_id','=',$id)
                                ->orderBy('created_at','desc')
                                ->paginate(10);
        return response()->JSON(view('contratos.parcial.tabla_contratos',compact('contratos','id','empresa','personal'))->render());
      }

      $contratos = Contratos::where('personals_id','=',$id)
                              ->orderBy('created_at','desc')
                              ->paginate(10);

      return view('contratos.index',compact('contratos','id','empresa','personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $empresa = Empresa::get()->first();

      $areas = UnidadArea::all();
      $cargos = Cargo::all();

      $personal = Personal::find($id);

      $array_area = [''=>'- Seleccione opción -'];
      foreach ($areas as $area) {
        $array_area[$area->id] = $area->name;
      }

      $array_cargo = [''=>'- Seleccione opción -'];
      foreach ($cargos as $cargo) {
        $array_cargo[$cargo->id] = $cargo->name;
      }

      return view('contratos.create',compact('id','personal','empresa','array_area','array_cargo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $personal = Personal::find($id);

      $contrato = new Contratos(array_map('mb_strtoupper',$request->all()));

      $contrato->estado="ACTIVO";

      $personal->contratos()->save($contrato);

      return redirect()->route('contratos.edit',$contrato->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Contrato del personal <strong>'.$personal->name.' '.$personal->apep.'</strong> registrado con éxito.
      </div>
      ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisbio\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function show(Contratos $contrato)
    {
      $empresa = Empresa::get()->first();

      return view('contratos.show',compact('contrato','empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function edit(Contratos $contrato)
    {
      $empresa = Empresa::get()->first();

      $areas = UnidadArea::all();
      $cargos = Cargo::all();

      $personal = Personal::find($contrato->personals_id);

      $array_area = [''=>'- Seleccione opción -'];
      foreach ($areas as $area) {
        $array_area[$area->id] = $area->name;
      }

      $array_cargo = [''=>'- Seleccione opción -'];
      foreach ($cargos as $cargo) {
        $array_cargo[$cargo->id] = $cargo->name;
      }

      return view('contratos.edit',compact('contrato','empresa','personal','array_area','array_cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contratos $contrato)
    {
      $contrato->update(array_map('mb_strtoupper',$request->all()));

      return redirect()->route('contratos.edit',$contrato->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Contrato del personal <strong>'.$contrato->personal->name.' '.$contrato->personal->apep.'</strong> actualizado con éxito.
      </div>
      ');
    }

    public function finalizar_contrato(Contratos $contrato)
    {
      $contrato->estado="FINALIZADO";
      $contrato->save();

      return redirect()->route('contratos.index',$contrato->personal->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        El contrato ha sido finalizado con éxito.
      </div>
      ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\Contratos  $contratos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contratos $contrato)
    {
      $id = $contrato->personals_id;

      $contrato->delete();

      return redirect()->route('contratos.index',$id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Contrato eliminado con éxito.</strong>
      </div>
      ');
    }

    public function pdf_contrato($id){
      $empresa = Empresa::get()->first();

      $personal=Personal::find($id);
      $contratos = Contratos::where('personals_id','=',$id)->get();

      // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

      $pdf = PDF::loadView('contratos.pdf.pdf_contratos',compact('contratos','personal','empresa'));
      return $pdf->stream('Especializacion_Personal.pdf');
    }

    public function pdf_contrato_single(Contratos $contrato){
      $empresa = Empresa::get()->first();

      $personal=Personal::find($contrato->personals_id);

      // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

      $pdf = PDF::loadView('contratos.pdf.pdf_contrato_single',compact('contrato','personal','empresa'));
      return $pdf->stream('Especializacion_Personal.pdf');
    }
}
