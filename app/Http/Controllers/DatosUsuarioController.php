<?php

namespace sisbio\Http\Controllers;

use sisbio\DatosUsuario;
use sisbio\User;
use sisbio\Empresa;

use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Role;
use sisbio\Cargo;
use Illuminate\Support\Facades\Hash;

class DatosUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($request->ajax())
      {
        $codigo = $request->get('codigo');
        $nombre = $request->get('nombre');
        $apellido = $request->get('apellido');
        $datos_usuarios = DatosUsuario::where('name','LIKE',"%$nombre%")
                          ->where('apep','LIKE',"%$apellido%")
                          ->paginate();
        return response()->JSON(view('usuarios.parcial.tablaUsuario',compact('datos_usuarios'))->render());
      }

      $empresa = Empresa::get()->first();
      $datos_usuarios = DatosUsuario::paginate();
      return view('usuarios.index',compact('datos_usuarios','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $roles_array = [
          '' => '- Seleccione una opción -'
        ];
        foreach ($roles as $rol) {
          $roles_array[$rol->id] = $rol->name.' ('.$rol->id.')';
        }

        $cargos = Cargo::all();
        $cargos_array = [
          '' => '- Seleccion una opción -',
        ];
        foreach ($cargos as $cargo) {
          $cargos_array[$cargo->id] = $cargo->name;
        }

        $empresa = Empresa::get()->first();
        return view('usuarios.create', compact('roles_array','cargos_array','empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $codigo_usuario = mb_strtoupper(substr($request->input('name'),0,1).
                                         $request->input('ci').$request->input('tipo_usuario'));

         // ASIGNAMOS EL NOMBRE Y LA CONTRASEÑA AL NUEVO USUARIO
        $user->name = $codigo_usuario;
        $user->password = Hash::make($request->input('ci'));
        $user->save();

        // ASIGNAMOS EL ROLE AL USUARIO
        $user->roles()->sync([$request->input('tipo_usuario')]);

        // ALMACENAMOS LOS DATOS DEL USUARIO EN LA TABLA DATOS_USUARIO
        $datosUsuario = new DatosUsuario(array_map('mb_strtoupper',$request->except('foto')));
          // guardamos la foto
        $file = $request->file('foto');
        $nombre_foto = time().$codigo_usuario.'.png';
        $file->move(public_path().'/imgs/',$nombre_foto);
          // asignamos el nombre de la foto al campo foto de la tabla
        $datosUsuario->foto = $nombre_foto;

        // RELACIONAMOS LA TABLA USER CON LA TABLA DATOS_USUARIO
        $user->datos_usuario()->save($datosUsuario);
        return redirect()->route('users.edit',$datosUsuario->id)->with('msg',
          '<div class="alert alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Registro realizado con éxito.</strong>
          </div>'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \sisbio\DatosUsuario  $datosUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(DatosUsuario $datosUsuario)
    {
      $roles = Role::all();
      $roles_array = [
        '' => '- Seleccione una opción -'
      ];
      foreach ($roles as $rol) {
        $roles_array[$rol->id] = $rol->name.' ('.$rol->id.')';
      }

      $cargos = Cargo::all();
      $cargos_array = [
        '' => '- Seleccion una opción -',
      ];
      foreach ($cargos as $cargo) {
        $cargos_array[$cargo->id] = $cargo->name;
      }

      $empresa = Empresa::get()->first();
      return view('usuarios.show', compact('datosUsuario','empresa','roles_array','cargos_array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \sisbio\DatosUsuario  $datosUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosUsuario $datosUsuario)
    {
      $roles = Role::all();
      $roles_array = [
        '' => '- Seleccione una opción -'
      ];
      foreach ($roles as $rol) {
        $roles_array[$rol->id] = $rol->name.' ('.$rol->id.')';
      }

      $cargos = Cargo::all();
      $cargos_array = [
        '' => '- Seleccion una opción -',
      ];
      foreach ($cargos as $cargo) {
        $cargos_array[$cargo->id] = $cargo->name;
      }

      $empresa = Empresa::get()->first();
      return view('usuarios.edit', compact('datosUsuario','empresa','roles_array','cargos_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \sisbio\DatosUsuario  $datosUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosUsuario $datosUsuario)
    {

      $user = User::find($datosUsuario->users_id);
      // ASIGNAMOS EL ROLE AL USUARIO
      $user->roles()->sync([$request->input('tipo_usuario')]);

      // ALMACENAMOS LOS DATOS DEL USUARIO EN LA TABLA DATOS_USUARIO
      $datosUsuario->update(array_map('mb_strtoupper',$request->except('foto')));

      if($request->hasFile('foto'))
      {
        // Eliminamos la antigua imagen
        $path_img = public_path().'/imgs/'.$datosUsuario->foto;//Obtenemos la ruta
        \File::delete($path_img); //Eliminamos la imagen

          // guardamos la foto
        $file = $request->file('foto');
        $nombre_foto = time().$user->name.'.png';
        $file->move(public_path().'/imgs/',$nombre_foto);
          // asignamos el nombre de la foto al campo foto de la tabla
        $datosUsuario->foto = $nombre_foto;

        $datosUsuario->save();
      }

      return redirect()->route('users.edit',$datosUsuario->id)->with('msg',
        '<div class="alert alert-success">
          <button class="close" data-dismiss="alert">&times;</button>
          <strong>Registro actualizado con éxito.</strong>
        </div>'
      );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \sisbio\DatosUsuario  $datosUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->datos_usuario->apem != "")
        {
          $nombre = $user->datos_usuario->apep.' '.$user->datos_usuario->apem.' '.$user->datos_usuario->name;
        }
        else{
          $nombre = $user->datos_usuario->apep.' '.$user->datos_usuario->name;
        }
        $img_path = public_path().'/imgs/'.$user->datos_usuario->foto;
        \File::delete($img_path);
        $user->delete();

        return redirect()->route('users.index')->with('msg',
          '<div class="alert alert-success">
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Usuario '.$nombre.' eliminado con éxito.</strong>
          </div>'
        );
    }
}
