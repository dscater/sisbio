<?php

namespace sisbio\Http\Controllers;

use Illuminate\Http\Request;
use sisbio\Empresa;
use sisbio\Notificacion;

class NotificacionController extends Controller
{
    public function index()
    {
        $empresa = Empresa::get()->first();
        NotificacionUserController::marcaVistos();
        $notificacions = Notificacion::orderBy('created_at', 'DESC')->paginate();
        return view("notificacions.index", compact("notificacions", "empresa"));
    }

    public function show(Notificacion $notificacion)
    {
        return $notificacion;
    }
}
