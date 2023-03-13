<?php

namespace sisbio\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionUserController extends Controller
{
    public function index()
    {
        $notificaciones_usuario = HomeController::iniciaNotificacionesUsuario(); //[notificacions, no_vistos];

        $no_vistos = $notificaciones_usuario["no_vistos"];
        $notificacions = $notificaciones_usuario["notificacions"];

        $html = view("parcials.notificaciones_user", compact("notificacions", "no_vistos"))->render();
        return response()->JSON($html);
    }

    public function nuevos(Request $request)
    {
        $datos = HomeController::getNuevasNotificaciones($request->id);
        $notificacions  = $datos["notificacions"];
        $no_vistos  = $datos["no_vistos"];
        $html = view("parcials.lista_notificaciones", compact("notificacions"))->render();
        return response()->JSON(["html" => $html, "no_vistos" => $no_vistos]);
    }

    public static function marcaVistos()
    {
        $user = Auth::user();
        $user->notificacion_users()->update(["visto" => 1]);
    }
}
