<?php

namespace sisbio\Http\Controllers;

use sisbio\FormacionPersonal;
use Illuminate\Http\Request;

use sisbio\Empresa;
use sisbio\Personal;
use Barryvdh\DomPDF\Facade as PDF;
class FormacionPersonalController extends Controller
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
          $institucion = $request->get('institucion');
          $formacions = FormacionPersonal::where('institucion','LIKE',"%$institucion%")
                                          ->where('personals_id','=',$id)
                                          ->paginate(10);
          return response()->JSON(view('formacion_academica.parcial.tabla_formacion',compact('formacions','id','empresa','personal'))->render());
        }

        $formacions = FormacionPersonal::where('personals_id','=',$id)->paginate(10);

        return view('formacion_academica.index',compact('formacions','id','empresa','personal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
      $empresa = Empresa::get()->first();

      return view('formacion_academica.create',compact('id','empresa'));
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

      $formacion = new FormacionPersonal(array_map('mb_strtoupper',$request->except('titulo')));

      $archivo = $request->file('titulo');
      $nombre_archivo = time().$personal->apep.$personal->name.str_replace(' ','_',$request->input('institucion')).'.pdf';
      $archivo->move(public_path().'/files/',$nombre_archivo);

      $formacion->titulo = $nombre_archivo;

      $personal->formacion()->save($formacion);

      return redirect()->route('formacions.edit',$formacion->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Formacion académica del personal <strong>'.$personal->name.' '.$personal->apep.'</strong> registrado con éxito.
      </div>
      ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisbio\FormacionPersonal  $formacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(FormacionPersonal $formacionPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\FormacionPersonal  $formacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(FormacionPersonal $formacion)
    {
      $empresa = Empresa::get()->first();

      return view('formacion_academica.edit',compact('formacion','empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\FormacionPersonal  $formacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormacionPersonal $formacion)
    {
      $personal = Personal::find($formacion->personals_id);

      $formacion->update(array_map('mb_strtoupper',$request->except('titulo')));

      if($request->hasFile('titulo')){
        $antiguo_archivo = public_path().'/files/'.$formacion->titulo;
        \File::delete($antiguo_archivo);

        $archivo = $request->file('titulo');
        $nombre_archivo = time().$personal->apep.$personal->name.str_replace(' ','_',$request->input('institucion')).'.pdf';
        $archivo->move(public_path().'/files/',$nombre_archivo);

        $formacion->titulo = $nombre_archivo;

        $formacion->save();
      }

      return redirect()->route('formacions.edit',$formacion->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Formacion académica del personal <strong>'.$formacion->personal->name.' '.$formacion->personal->apep.'</strong> actualizado con éxito.
      </div>
      ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\FormacionPersonal  $formacionPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormacionPersonal $formacion)
    {
      $id = $formacion->personals_id;

      $titulo = $formacion->titulo;
      \File::delete(public_path().'/files/'.$titulo);

      $formacion->delete();

      return redirect()->route('formacions.index',$id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Formacion académica eliminado con éxito.</strong>
      </div>
      ');
    }

    public function pdf_formacion($id){
      $empresa = Empresa::get()->first();

      $personal=Personal::find($id);
      $formacions = FormacionPersonal::where('personals_id','=',$id)->get();

      // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

      $pdf = PDF::loadView('formacion_academica.pdf.pdf_formacion',compact('formacions','personal','empresa'));
      return $pdf->stream('Formacion_Personal.pdf');
    }

    public function descargar(FormacionPersonal $formacion){
       return response()->download(public_path().'/files/'.$formacion->titulo);
    }

}
