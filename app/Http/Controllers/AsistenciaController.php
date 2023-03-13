<?php

namespace sisbio\Http\Controllers;

use sisbio\Asistencia;
use Illuminate\Http\Request;

use sisbio\Personal;
use sisbio\Empresa;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use PHPExcel_IOFactory;
use sisbio\RegistroLog;

class AsistenciaController extends Controller
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
			$fecha = $request->get('fecha');
			$asistencias = Asistencia::where('fecha', 'LIKE', "%$fecha%")
				->orderBy('created_at', 'desc')
				->paginate(10);
			return response()->JSON(view('asistencias.parcial.tabla_asistencias', compact('asistencias', 'id', 'empresa', 'personal'))->render());
		}

		$asistencias = Asistencia::where('personals_id', '=', $id)
			->orderBy('created_at', 'desc')->paginate(10);
		return view('asistencias.index', compact('asistencias', 'id', 'empresa', 'personal'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create($id)
	{
		$empresa = Empresa::get()->first();

		return view('asistencias.create', compact('id', 'empresa'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $id)
	{
		// return date('G:i')
		$comprueba_existencia = Asistencia::where('fecha', '=', $request->input('fecha'))
			->where('personals_id', '=', $id)->get();

		if (count($comprueba_existencia) == 0) {
			$personal = Personal::find($id);
			if ($request->input('ingreso_maniana') != "" && $request->input('salida_maniana') != "") {
				$asistencia = new Asistencia(array_map('mb_strtoupper', $request->except('ingreso_tarde', 'salida_tarde')));
			} else {
				if ($request->input('ingreso_tarde') != "" && $request->input('salida_tarde') != "") {
					$asistencia = new Asistencia(array_map('mb_strtoupper', $request->except('ingreso_maniana', 'salida_maniana')));
				} else {
					return redirect()->route('asistencias.create', $id)->with(
						'msg',
						'<div class="alert alert-info">
							<button class="close" data-dismiss="alert">&times;</button>
							<strong>Debes completar los campos Ingreso y salida.</strong>
						</div>
						'
					);
				}
			}
			$personal->asistencias()->save($asistencia);

			RegistroLog::create([
				"user_id" => Auth::user()->id,
				"modulo" => "ASISTENCIAS",
				"accion" => "REGISTRO",
				"descripcion" => "EL USUARIO " . Auth::user()->name . " REGISTRO UNA ASISTENCIA",
			]);

			return redirect()->route('asistencias.edit', $asistencia->id)->with('msg', '
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            Asistencia del personal <strong>' . $personal->name . ' ' . $personal->apep . '</strong> registrado con éxito.
            </div>
            ');
		} else {
			return redirect()->route('asistencias.create', $id)->with('msg', '
            <div class="alert alert-info">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Ya existe un registro de asistencia en la fecha: ' . date('d/m/Y', strtotime($request->input('fecha'))) . '</strong>
            </div>
            ');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \sisbio\Asistencia  $asistencia
	 * @return \Illuminate\Http\Response
	 */
	public function show(Asistencia $asistencia)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \sisbio\Asistencia  $asistencia
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Asistencia $asistencia)
	{
		$empresa = Empresa::get()->first();

		return view('asistencias.edit', compact('asistencia', 'empresa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \sisbio\Asistencia  $asistencia
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Asistencia $asistencia)
	{
		$asistencia->update(array_map('mb_strtoupper', $request->all()));

		return redirect()->route('asistencias.edit', $asistencia->id)->with('msg', '
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            Asistencia del personal <strong>' . $asistencia->personal->name . ' ' . $asistencia->personal->apep . '</strong> actualizado con éxito.
            </div>
            ');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \sisbio\Asistencia  $asistencia
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Asistencia $asistencia)
	{
		$id = $asistencia->personals_id;

		$asistencia->delete();

		RegistroLog::create([
			"user_id" => Auth::user()->id,
			"modulo" => "ASISTENCIAS",
			"accion" => "ELIMINO",
			"descripcion" => "EL USUARIO " . Auth::user()->name . " ELIMINO UNA ASISTENCIA",
		]);

		return redirect()->route('asistencias.index', $id)->with('msg', '
            <div class="alert alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Asistencia eliminado con éxito.</strong>
            </div>
            ');
	}

	public function pdf_asistencias($id)
	{
		$empresa = Empresa::get()->first();

		$personal = Personal::find($id);
		$asistencias = Asistencia::where('personals_id', '=', $id)
			->orderBy('created_at', 'desc')->get();

		// return view('personals.pdf.personal_pdf',compact('personal','empresa'));

		$pdf = PDF::loadView('asistencias.pdf.pdf_pagos_asistencias', compact('asistencias', 'personal', 'empresa'));
		return $pdf->stream('Asistencia_Persona.pdf');
	}

	public function subir_asistencias(Request $request)
	{
		if ($request->hasFile('asistencia')) {
			$excel = $request->file('asistencia');
			$objPHPExcel = PHPExcel_IOFactory::load($excel);
			//Asigno la hoja de calculo activa
			$objPHPExcel->setActiveSheetIndex(0);
			//Obtengo el numero de filas del archivo
			$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

			$fecha = '';
			$hora = '';

			$entrada_antes = '';
			$entrada_antes_regreso = '';
			$tolerancia_entrada = '';
			$tolerancia_regreso = '';

			$horas = '';

			for ($i = 2; $i <= $numRows; $i++) {
				// OBTENER DATOS DEL ARCHIVO EXCEL
				$id = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
				$nombre = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
				$fecha_hora = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
				$apes = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();

				// Obtener para fecha y hora para hacer consultas a la BD
				$espacio_fecha_hora = strrpos($fecha_hora, ' ');

				$fecha = substr($fecha_hora, 0, $espacio_fecha_hora);
				$hora = substr($fecha_hora, ($espacio_fecha_hora + 1), strlen($fecha_hora));

				$fecha = str_replace('/', '-', $fecha);

				$fecha = date('Y-m-d', strtotime($fecha));

				// Añadir un 0 delante de las cadenas con tamaño 7
				if (strlen($hora) == 7) {
					$hora = '0' . $hora;
				}

				$horas .= $hora . ' | ';

				// Insertando datos a la BD
				// 1ro. consultar si ya existen datos con la misma fecha, para que no vea redundancias
				$existe = Asistencia::where('personals_id', '=', $id)
					->where('fecha', '=', $fecha)
					->get()->first();

				//obtener el area y su horario del personal
				$personal = Personal::find($id); //Obtener personal
				$contrato_personal = $personal->contratos->where('estado', 'ACTIVO')->first(); //Contrato activo
				$horario_personal = $contrato_personal->area->horario; //Horario del personal en base al contrato

				$ingreso_maniana = $horario_personal->ingreso_maniana;
				$salida_maniana = $horario_personal->salida_maniana;
				$ingreso_tarde = $horario_personal->ingreso_tarde;
				$salida_tarde = $horario_personal->salida_tarde;

				//Determinando tiempo de anticipacion y tolerancia de entradas
				$hora_ingreso_maniana = substr($ingreso_maniana, 1, 1);
				$hora_ingreso_tarde = substr($ingreso_tarde, 0, 2);

				$entrada_antes = '0' . ($hora_ingreso_maniana - 1) . ':30:00'; //Entrada anticipada
				$entrada_antes_regreso = ($hora_ingreso_tarde - 1) . ':30:00'; //Entrada anticipada regreso(descanso)
				$tolerancia_entrada = $hora_ingreso_maniana . ':15:00';
				$tolerancia_regreso = $hora_ingreso_tarde . ':15:00';

				if (!$existe) {
					//crear un nuevo registro
					$nueva_asistencia = new Asistencia();
					$nueva_asistencia->personals_id = $id;
					$nueva_asistencia->fecha = $fecha;

					if ($hora < $tolerancia_entrada && $hora > $entrada_antes) {
						$nueva_asistencia->ingreso_maniana = $hora;
					}

					if ($hora > $salida_maniana && $hora < $entrada_antes_regreso) {
						$nueva_asistencia->salida_maniana = $hora;
					}
					if ($hora < $tolerancia_regreso && $hora > $entrada_antes_regreso) {
						$nueva_asistencia->ingreso_tarde = $hora;
					}
					if ($hora > $salida_tarde) {
						$nueva_asistencia->salida_tarde = $hora;
					}

					$nueva_asistencia->estado = 'ASISTIÓ';

					$nueva_asistencia->save(); //Guardar el nuevo registro
				} else {
					// SI EXISTE DEBEMOS COMPROBAR SI LOS DATOS DE INGRESOS Y SALIDAS ESTAN COMPLETOS
					$contador_asistencias = 0;
					if ($existe->ingreso_maniana == null || $existe->ingreso_maniana == "") {
						if ($hora < $tolerancia_entrada && $hora > $entrada_antes) {
							$existe->ingreso_maniana = $hora;
						}
					} else {
						$contador_asistencias++;
					}
					if ($existe->salida_maniana == null || $existe->salida_maniana == "") {
						if ($hora >= $salida_maniana && $hora < $entrada_antes_regreso) {
							$existe->salida_maniana = $hora;
						}
					} else {
						$contador_asistencias++;
					}
					if ($existe->ingreso_tarde == null || $existe->ingreso_tarde == "") {
						if ($hora < $tolerancia_regreso && $hora > $entrada_antes_regreso) {
							$existe->ingreso_tarde = $hora;
						}
					} else {
						$contador_asistencias++;
					}
					if ($existe->salida_tarde == null || $existe->salida_tarde == "") {
						if ($hora >= $salida_tarde) {
							$existe->salida_tarde = $hora;
						}
					} else {
						$contador_asistencias++;
					}

					if ($contador_asistencias < 4) {
						$existe->save();
					}
				}
			} //FIN FOR

			return redirect()->route('home')->with(
				'msg',
				'<div class="alert alert-success alert2">
				<button class="close" data-dismiss="alert" id="msg_success">&times;</button>
 				Datos cargados con éxito.</div>'
			);
		} else {
			return redirect()->route('home')->with(
				'error',
				'<div class="alert alert-danger alert2">
				<button class="close" data-dismiss="alert" id="msg_error">&times;</button>
     			No se selecccionó ningun archivo .xls</div>'
			);
		}
	}
}
