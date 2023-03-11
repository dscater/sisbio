<?php

namespace sisbio\Http\Controllers;

use sisbio\PagosExtra;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use sisbio\Pagos;

class PagosExtraController extends Controller
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
        $anios = $request->get('anio');
        $mes = $request->get('mes');

        $pagosExtras = PagosExtra::where('anio','LIKE',"%$anios%")
                                  ->where('mes','LIKE',"%$mes%")
                                  ->where('personals_id','=',$id)
                                  ->orderBy('created_at','desc')
                                  ->paginate(10);
        return response()->JSON(view('pagos_extra.parcial.tabla_pagosExtras',compact('pagosExtras','id','empresa','personal','array_mes'))->render());
      }

      $anio_actual = date('Y');

      $anio_comienzo = $anio_actual - 5;

      $array_anios = [''=>'- Año (Todos) -'];

      for($i = 1 ; $i<=8 ; $i++)
      {
        $array_anios[$anio_comienzo+$i] = $anio_comienzo+$i;
      }

      $pagosExtras = PagosExtra::where('personals_id','=',$id)
                                ->orderBy('created_at','desc')->paginate(10);

      return view('pagos_extra.index',compact('pagosExtras','id','empresa','personal','array_mes','array_anios'));
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


      return view('pagos_extra.create',compact('id','array_anios','anio_actual','array_mes','empresa'));
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

        $pagoExtra = new PagosExtra(array_map('mb_strtoupper',$request->all()));

        $pagoExtra->fech_pago = date('Y-m-d');

        $personal->pagos_extra()->save($pagoExtra);

        return redirect()->route('pagos_extras.edit',$pagoExtra->id)->with('msg','
        <div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          Pago extra del personal <strong>'.$personal->name.' '.$personal->apep.'</strong> registrado con éxito.
        </div>
        ');
      }
      else{
        return redirect()->route('pagos_extras.create',$id)->with('msg','
        <div class="alert alert-info">
          <button class="close" data-dismiss="alert">&times;</button>
          El pago extra no pudo ser registrado porque ya se realizó el pago respectivo en el mes de <strong>'.
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
     * @param  \sisbio\PagosExtra  $pagosExtra
     * @return \Illuminate\Http\Response
     */
    public function show(PagosExtra $pagoExtra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\PagosExtra  $pagosExtra
     * @return \Illuminate\Http\Response
     */
    public function edit(PagosExtra $pagoExtra)
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

      return view('pagos_extra.edit',compact('pagoExtra','empresa','array_mes','array_anios','anio_actual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\PagosExtra  $pagosExtra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PagosExtra $pagoExtra)
    {
      $pagoExtra->update(array_map('mb_strtoupper',$request->all()));

      return redirect()->route('pagos_extras.edit',$pagoExtra->id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        Pago extra del personal <strong>'.$pagoExtra->personal->name.' '.$pagoExtra->personal->apep.'</strong> actualizado con éxito.
      </div>
      ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\PagosExtra  $pagosExtra
     * @return \Illuminate\Http\Response
     */
    public function destroy(PagosExtra $pagoExtra)
    {
      $id = $pagoExtra->personals_id;

      $pagoExtra->delete();

      return redirect()->route('pagos_extras.index',$id)->with('msg','
      <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Pago extra eliminado con éxito.</strong>
      </div>
      ');
    }

    public function pdf_pagos_extra($id){
      $empresa = Empresa::get()->first();

      $personal=Personal::find($id);
      $pagosExtras = PagosExtra::where('personals_id','=',$id)
                                ->orderBy('created_at','desc')->get();

      // return view('personals.pdf.personal_pdf',compact('personal','empresa'));

      $pdf = PDF::loadView('pagos_extra.pdf.pdf_pagos_extra',compact('pagosExtras','personal','empresa'));
      return $pdf->stream('Pagos_extra_Personal.pdf');
    }
}
