<?php

namespace sisbio\Http\Controllers;

use Illuminate\Http\Request;
use sisbio\User;
use sisbio\Empresa;
use Illuminate\Support\Facades\Hash;

use sisbio\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
  public function view_config(User $user)
  {
    $empresa = Empresa::get()->first();
    return view('usuarios.config', compact('empresa', 'user'));
  }

  public function config_update(UserUpdateRequest $request, User $user)
  {
    $empresa = Empresa::get()->first();

    $contraseña_antigua = $request->input('old_password');
    $contraseña_nueva = $request->input('new_password');

    if ($contraseña_antigua != "" || $contraseña_antigua != null) {
      if ($contraseña_nueva != "" || $contraseña_nueva != null) {
        if (Hash::check($contraseña_antigua, $user->password)) {
          $user->password = Hash::make($contraseña_nueva);
        } else {
          return redirect()->route('users.config', $user->id)->with('pass', 'La contraseña no coincide. Intentalo nuevamente.');
        }
      } else {
        return redirect()->route('users.config', $user->id)->with('pass_new', 'Debes indicar la nueva contraseña.');
      }
    }

    $user->name = mb_strtoupper($request->input('name'));

    $user->save();

    return redirect()->route('users.config', $user->id)->with(
      'msg',
      '<div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>Cuenta actualizada con éxito.</strong>
      </div>'
    );
  }
}
