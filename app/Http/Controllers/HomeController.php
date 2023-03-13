<?php

namespace sisbio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use sisbio\Empresa;

use sisbio\Asistencia;
use sisbio\Contratos;
use sisbio\Notificacion;
use sisbio\NotificacionUser;
use sisbio\UnidadArea;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ultima_asistencia = Asistencia::get()->last();

        $contrato = null;
        $contrato_area_horario = null;
        if ($ultima_asistencia) {
            $contrato = Contratos::where('personals_id', '=', $ultima_asistencia->personals_id)
                ->where('estado', '=', 'ACTIVO')
                ->get()->first();
            if ($contrato) {
                $contrato_area_horario = $contrato->area->horario;
            }
        }


        $areas = UnidadArea::all();
        foreach ($areas as $area) {
            $array_areas[$area->id] = $area->name;
        }

        $empresa = Empresa::get()->first();
        return view('home', compact('empresa', 'ultima_asistencia', 'contrato', 'array_areas', 'contrato_area_horario'));
    }

    public function asistencias(Request $request)
    {
        $contrato = null;
        $contrato_area_horario = null;
        if ($request->ajax()) {
            $ultima_actualizacion = Asistencia::max('updated_at');
            $ultima_asistencia = Asistencia::where('updated_at', '=', $ultima_actualizacion)->get()->first();

            if ($ultima_asistencia) {
                $contrato = Contratos::where('personals_id', '=', $ultima_asistencia->personals_id)
                    ->where('estado', '=', 'ACTIVO')
                    ->get()->first();
                if ($contrato) {
                    $contrato_area_horario = $contrato->area->horario;
                }
            }

            $areas = UnidadArea::all();
            foreach ($areas as $area) {
                $array_areas[$area->id] = $area->name;
            }

            $nuevas_notificaciones = [];
            if ($request->ultimo_id) {
                $nuevas_notificaciones = HomeController::getNuevasNotificaciones($request->ultimo_id);
            }

            if ($ultima_asistencia != null) {
                $html = view('parcials.asistencias', compact(
                    'ultima_asistencia',
                    'contrato',
                    'array_areas',
                    'contrato_area_horario',
                    'nuevas_notificaciones'
                ))->render();
                return response()->JSON([
                    "html" => $html,
                    "nuevas_notificaciones" => $nuevas_notificaciones,
                ]);
            } else {
                return response()->JSON('NO EXISTEN REGISTROS.');
            }
        }
    }

    public static function iniciaNotificacionesUsuario()
    {
        $user = Auth::user();
        $asistencias_sin_notificar = Asistencia::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('notificacions')
                ->whereRaw('notificacions.asistencia_id = asistencias.id');
        })->get();

        foreach ($asistencias_sin_notificar as $value) {
            $detalle = "INGRESO DE " . $value->personal->full_name;
            if ($value->ingreso_tarde != "" && $value->salida_tarde != "") {
                $detalle = "RETORNO DE " . $value->personal->full_name;
                if ($value->ingreso_tarde != $value->salida_tarde) {
                    $detalle = "SALIDA DE " . $value->personal->full_name;
                }
            } else {
                if ($value->ingreso_maniana != "" && $value->salida_maniana != "") {
                    if ($value->ingreso_maniana != $value->salida_maniana) {
                        $detalle = "SALIDA DE " . $value->personal->full_name;
                    }
                }
            }
            // nueva notificacion
            $nueva_notificacion = Notificacion::create([
                "asistencia_id" => $value->id,
                "detalle" => $detalle,
                "fecha" => date("Y-m-d"),
                "hora" => date("H:i"),
            ]);

            // notificacion usuario
            NotificacionUser::create([
                "notificacion_id" => $nueva_notificacion->id,
                "user_id" => $user->id,
                "visto" => 0,
            ]);
        }

        HomeController::creaNotificacionesUser();

        $datos = HomeController::getNotificacionesUsuario();

        return $datos;
    }

    public static function getNotificacionesUsuario(): array
    {
        $user = Auth::user();
        $no_vistos = count(NotificacionUser::where("user_id", $user->id)->where("visto", 0)->get());
        $notificacions = NotificacionUser::select("notificacion_users.*")
            ->join("notificacions", "notificacions.id", "=", "notificacion_users.notificacion_id")
            ->where("notificacion_users.user_id", $user->id)
            ->orderBy("notificacions.created_at", "desc")->get();

        return ["notificacions" => $notificacions, "no_vistos" => $no_vistos];
    }

    public static function creaNotificacionesUser()
    {
        $user = Auth::user();
        $notificaciones_usuario = Notificacion::whereNotExists(function ($query) use ($user) {
            $query->select(DB::raw(1))
                ->from('notificacion_users')
                ->whereRaw('notificacion_users.notificacion_id = notificacions.id')
                ->whereRaw('notificacion_users.user_id = ' . $user->id);
        })->get();
        foreach ($notificaciones_usuario as $value) {
            // notificacion usuario
            NotificacionUser::create([
                "notificacion_id" => $value->id,
                "user_id" => $user->id,
                "visto" => 0,
            ]);
        }
    }

    public static function getNuevasNotificaciones($id)
    {
        HomeController::creaNotificacionesUser();
        $user = Auth::user();
        $notificacions = NotificacionUser::select("notificacion_users.*")
            ->join("notificacions", "notificacions.id", "=", "notificacion_users.notificacion_id")
            ->where("user_id", $user->id)
            ->where("notificacion_users.id", ">", $id)
            ->orderBy("notificacions.created_at", "desc")->get();
        $no_vistos = count(NotificacionUser::where("user_id", $user->id)->where("visto", 0)->get());
        return ["notificacions" => $notificacions, "no_vistos" => $no_vistos];
    }
}
