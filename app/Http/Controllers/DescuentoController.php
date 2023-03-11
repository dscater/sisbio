<?php

namespace sisbio\Http\Controllers;

use sisbio\Descuento;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use sisbio\Pagos;

class DescuentoController extends Controller
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

      if($request->ajax())
      {
        $anio = $request->get('anio');
        $mes = $request->get('mes');
        $descuentos = Descuento::where('anio','LIKE',"%$anio%")
                                  ->where('mes','LIKE',"%$mes%")
                                  ->where('personals_id','=',$id)
                                  ->orderBy('created_at','desc')
                                  ->paginate(10);
        return response()->JSON(view('descuentos.parcial.tabla_descuentos',compact('descuentos','id','empresa','personal','array_mes'))->render());
      }

      $anio_actual = date('Y');

      $anio_comienzo = $anio_actual - 5;

      $array_anios = [''=>'- Año (Todos) -'];

      for($i = 1 ; $i<=8 ; $i++)
      {
        $array_anios[$anio_comienzo+$i] = $anio_comienzo+$i;
      }

      $descuentos = Descuento::where('personals_id','=',$id)
                                ->orderBy('created_at','desc')->paginate(10);

      return view('descuentos.index',compact('descuentos','id','empresa','personal','array_mes','array_anios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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

      $array_anios = [''=>'- Año -'];

      for($i = 1 ; $i<=8 ; $i++)
      {
        $array_anios[$anio_comienzo+$i] = $anio_comienzo+$i;
      }


      return view('descuentos.create',compact('id','array_anios','anio_actual','array_mes','empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
      $existencia_pago = Pagos::where('mes','=',$request->input('mes'))
                                    ->where('anio','=',$request->input('anio'))
                                    ->get();

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

      if(count($existencia_pago) == 0)
      {
        $personal = Personal::find($id);

        $descuento = new Descuento(array_map('mb_strtoupper',$request->all()));

        $descuento->fecha_desc = date('Y-m-d');

        $personal->descuentos()->save($descuento);

        return redirect()->route('descuentos.edit',$descuento->id)->with('msg','
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          Descuento del personal <strong>'.$personal->name.' '.$personal->apep.'</strong> registrado con éxito.
        </div>
        ');
      }
      else{
        return redirect()->route('descuentos.create',$id)->with('msg','
        <div class="alert alert-info">
          <button class="close" data-dismiss="alert">&times;</button>
          El descuento no pudo ser registrado porque ya se realizó el pago respectivo en el mes de <strong>'.
          $array_mes[$request->input('mes')].
          ' del año '.$request->input('anio').'
          </strong>
        </div>
        ');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisbio\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function show(Descuento $descuento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function edit(Descuento $descuento)
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

      $array_anios = [''=>'- Año -'];

      for($i = 1 ; $i<=8 ; $i++)
      {
        $array_anios[$anio_comienzo+$i] = $anio_comienzo+$i;
      }

      return view('descuentos.edit',compact('descuento','empresa','array_mes','array_anios','anio_actual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descuento $descuento)
    {
      $descuento->update(array_map('mb_strtoupper',$request->all()));

      return redirect()->route('descuentos.edit',$descuento->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Descuento del personal <strong>'.$descuento->personal->name.' '.$descuento->personal->apep.'</strong> actualizado con éxito.
      </div>
      ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descuento $descuento)
    {
      $id = $descuento->personals_id;

      $descuento->delete();

      return redirect()->route('descuentos.index',$id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Descuento eliminado con éxito.</strong>
      </div>
      ');
    }

    public function pdf_descuentos($id){
      $empresa = Empresa::get()->first();

      $personal=Personal::find($id);
      $descuentos = Descuento::where('personals_id','=',$id)
                                ->orderBy('created_at','desc')->get();

      // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

      $pdf = PDF::loadView('descuentos.pdf.pdf_pagos_extra',compact('descuentos','personal','empresa'));
      return $pdf->stream('Descuento_Persona.pdf');
    }
}
