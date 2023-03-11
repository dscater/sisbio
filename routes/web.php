<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use sisbio\Empresa;

Route::get('/', function () {
    $empresa = Empresa::get()->first();
    return view('auth.login', compact('empresa'));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('config_user/{user}', 'UserController@view_config')->name('users.config');

    Route::put('config_user/{user}', 'UserController@config_update')->name('users.config_update');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home/asistencias', 'HomeController@asistencias')->name('home.asistencias');

    // USUARIOS MAESTRO Y AUXILIAR
    Route::GET('users', 'DatosUsuarioController@index')
        ->name('users.index')
        ->middleware('permission:users.index');

    Route::GET('users/create', 'DatosUsuarioController@create')
        ->name('users.create')
        ->middleware('permission:users.create');

    Route::GET('users/edit/{datosUsuario}', 'DatosUsuarioController@edit')
        ->name('users.edit')
        ->middleware('permission:users.edit');

    Route::GET('users/show/{datosUsuario}', 'DatosUsuarioController@show')
        ->name('users.show')
        ->middleware('permission:users.show');

    Route::POST('users/store', 'DatosUsuarioController@store')
        ->name('users.store')
        ->middleware('permission:users.create');

    Route::PUT('users/update/{datosUsuario}', 'DatosUsuarioController@update')
        ->name('users.update')
        ->middleware('permission:users.edit');

    Route::DELETE('users/destroy/{user}', 'DatosUsuarioController@destroy')
        ->name('users.destroy')
        ->middleware('permission:users.destroy');


    // CARGOS
    Route::GET('cargos', 'CargoController@index')
        ->name('cargos.index')
        ->middleware('permission:cargos.index');

    Route::GET('cargos/create', 'CargoController@create')
        ->name('cargos.create')
        ->middleware('permission:cargos.create');

    Route::GET('cargos/edit/{cargo}', 'CargoController@edit')
        ->name('cargos.edit')
        ->middleware('permission:cargos.edit');

    Route::GET('cargos/show/{cargo}', 'CargoController@show')
        ->name('cargos.show')
        ->middleware('permission:cargos.show');

    Route::POST('cargos/store', 'CargoController@store')
        ->name('cargos.store')
        ->middleware('permission:cargos.create');

    Route::PUT('cargos/update/{cargo}', 'CargoController@update')
        ->name('cargos.update')
        ->middleware('permission:cargos.edit');

    Route::DELETE('cargos/destroy/{cargo}', 'CargoController@destroy')
        ->name('cargos.destroy')
        ->middleware('permission:cargos.destroy');

    // UNIDAD Y AREAS
    Route::GET('areas', 'UnidadAreaController@index')
        ->name('areas.index')
        ->middleware('permission:areas.index');

    Route::GET('areas/create', 'UnidadAreaController@create')
        ->name('areas.create')
        ->middleware('permission:areas.create');

    Route::GET('areas/edit/{area}', 'UnidadAreaController@edit')
        ->name('areas.edit')
        ->middleware('permission:areas.edit');

    Route::GET('areas/show/{area}', 'UnidadAreaController@show')
        ->name('areas.show')
        ->middleware('permission:areas.show');

    Route::POST('areas/store', 'UnidadAreaController@store')
        ->name('areas.store')
        ->middleware('permission:areas.create');

    Route::PUT('areas/update/{area}', 'UnidadAreaController@update')
        ->name('areas.update')
        ->middleware('permission:areas.edit');

    Route::DELETE('areas/destroy/{area}', 'UnidadAreaController@destroy')
        ->name('areas.destroy')
        ->middleware('permission:areas.destroy');

    // PERSONAL
    Route::GET('personals', 'PersonalController@index')
        ->name('personals.index')
        ->middleware('permission:personals.index');

    Route::get('personals/config_personal', 'PersonalController@config_personal')
        ->name('personals.config_personal')
        ->middleware('permission:personals.index');

    Route::get('personal/biometrico', 'PersonalController@DatosBiometrico')
        ->name('personals.biometrico')
        ->middleware('permission:personals.index');

    Route::GET('personals/datos_pago/{id}', 'PersonalController@datos_pago')
        ->name('personals.datos_pago');

    Route::GET('personals/identifica', 'PersonalController@identifica')
        ->name('personals.identifica');

    Route::GET('personals/create', 'PersonalController@create')
        ->name('personals.create')
        ->middleware('permission:personals.create');

    Route::GET('personals/edit/{personal}', 'PersonalController@edit')
        ->name('personals.edit')
        ->middleware('permission:personals.edit');

    Route::GET('personals/show/{personal}', 'PersonalController@show')
        ->name('personals.show')
        ->middleware('permission:personals.show');

    Route::GET('personals/pdf/{personal}', 'PersonalController@pdf_personal')
        ->name('personals.pdf')
        ->middleware('permission:personals.index');

    Route::GET('personals/curriculum/{personal}', 'PersonalController@curriculum')
        ->name('personals.curriculum')
        ->middleware('permission:personals.index');

    Route::GET('personals/historia/{personal}', 'PersonalController@historia')
        ->name('personals.historia')
        ->middleware('permission:personals.index');

    Route::POST('personals/store', 'PersonalController@store')
        ->name('personals.store')
        ->middleware('permission:personals.create');

    Route::PUT('personals/update/{personal}', 'PersonalController@update')
        ->name('personals.update')
        ->middleware('permission:personals.edit');

    Route::DELETE('personals/destroy/{personal}', 'PersonalController@destroy')
        ->name('personals.destroy')
        ->middleware('permission:personals.destroy');

    // FORMACION
    Route::GET('personals/formacions/{id}', 'FormacionPersonalController@index')
        ->name('formacions.index')
        ->middleware('permission:formacion.index');

    Route::GET('personals/formacions/create/{id}', 'FormacionPersonalController@create')
        ->name('formacions.create')
        ->middleware('permission:formacion.create');

    Route::GET('formacions/edit/{formacion}', 'FormacionPersonalController@edit')
        ->name('formacions.edit')
        ->middleware('permission:formacion.edit');

    Route::GET('personals/formacions/show/{formacion}', 'FormacionPersonalController@show')
        ->name('formacions.show')
        ->middleware('permission:formacion.show');

    Route::GET('personals/pdf/formacion/{id}', 'FormacionPersonalController@pdf_formacion')
        ->name('formacions.pdf')
        ->middleware('permission:formacion.index');

    Route::GET('personals/pdf/formacion/descargar_titulo/{formacion}', 'FormacionPersonalController@descargar')
        ->name('formacions.descarga')
        ->middleware('permission:formacion.index');

    Route::POST('personals/formacions/store/{id}', 'FormacionPersonalController@store')
        ->name('formacions.store')
        ->middleware('permission:formacion.create');

    Route::PUT('personals/formacions/update/{formacion}', 'FormacionPersonalController@update')
        ->name('formacions.update')
        ->middleware('permission:formacion.edit');

    Route::DELETE('personals/formacions/destroy/{formacion}', 'FormacionPersonalController@destroy')
        ->name('formacions.destroy')
        ->middleware('permission:formacion.destroy');

    // ESPECIALIZACIONES
    Route::GET('personals/especializacions/{id}', 'EspecializacionPersonalController@index')
        ->name('especializacions.index')
        ->middleware('permission:especializacion.index');

    Route::GET('personals/especializacions/create/{id}', 'EspecializacionPersonalController@create')
        ->name('especializacions.create')
        ->middleware('permission:especializacion.create');

    Route::GET('personals/especializacions/edit/{especializacion}', 'EspecializacionPersonalController@edit')
        ->name('especializacions.edit')
        ->middleware('permission:especializacion.edit');

    Route::GET('personals/especializacions/show/{especializacion}', 'EspecializacionPersonalController@show')
        ->name('especializacions.show')
        ->middleware('permission:especializacion.show');

    Route::GET('personals/pdf/especializacions/{id}', 'EspecializacionPersonalController@pdf_especializacion')
        ->name('especializacions.pdf')
        ->middleware('permission:especializacion.index');

    Route::GET('personals/pdf/especializacions/descargar/{especializacion}', 'EspecializacionPersonalController@descargar')
        ->name('especializacions.descargar')
        ->middleware('permission:especializacion.index');

    Route::POST('personals/especializacions/store/{id}', 'EspecializacionPersonalController@store')
        ->name('especializacions.store')
        ->middleware('permission:especializacion.create');

    Route::PUT('personals/especializacions/update/{especializacion}', 'EspecializacionPersonalController@update')
        ->name('especializacions.update')
        ->middleware('permission:especializacion.edit');

    Route::DELETE('personals/especializacions/destroy/{especializacion}', 'EspecializacionPersonalController@destroy')
        ->name('especializacions.destroy')
        ->middleware('permission:especializacion.destroy');

    // EXPERIENCIA LABORAL
    Route::GET('personals/experiencias/{id}', 'ExperienciaPersonalController@index')
        ->name('experiencias.index')
        ->middleware('permission:experiencia.index');

    Route::GET('personals/experiencias/create/{id}', 'ExperienciaPersonalController@create')
        ->name('experiencias.create')
        ->middleware('permission:experiencia.create');

    Route::GET('personals/experiencias/edit/{experiencia}', 'ExperienciaPersonalController@edit')
        ->name('experiencias.edit')
        ->middleware('permission:experiencia.edit');

    Route::GET('personals/experiencias/show/{experiencia}', 'ExperienciaPersonalController@show')
        ->name('experiencias.show')
        ->middleware('permission:experiencia.show');

    Route::GET('personals/pdf/experiencias/{id}', 'ExperienciaPersonalController@pdf_experiencia')
        ->name('experiencias.pdf')
        ->middleware('permission:experiencia.index');

    Route::POST('personals/experiencias/store/{id}', 'ExperienciaPersonalController@store')
        ->name('experiencias.store')
        ->middleware('permission:experiencia.create');

    Route::PUT('personals/experiencias/update/{experiencia}', 'ExperienciaPersonalController@update')
        ->name('experiencias.update')
        ->middleware('permission:experiencia.edit');

    Route::DELETE('personals/experiencias/destroy/{experiencia}', 'ExperienciaPersonalController@destroy')
        ->name('experiencias.destroy')
        ->middleware('permission:experiencia.destroy');

    // CONTRATOS
    Route::GET('personals/contratos/{id}', 'ContratosController@index')
        ->name('contratos.index')
        ->middleware('permission:contratos.index');

    Route::GET('personals/contratos/create/{id}', 'ContratosController@create')
        ->name('contratos.create')
        ->middleware('permission:contratos.create');

    Route::GET('personals/contratos/edit/{contrato}', 'ContratosController@edit')
        ->name('contratos.edit')
        ->middleware('permission:contratos.edit');

    Route::GET('personals/contratos/show/{contrato}', 'ContratosController@show')
        ->name('contratos.show')
        ->middleware('permission:contratos.show');

    Route::GET('personals/pdf/contratos/{id}', 'ContratosController@pdf_contrato')
        ->name('contratos.pdf')
        ->middleware('permission:contratos.index');

    Route::GET('personals/pdf/contratos/{contrato}/contrato', 'ContratosController@pdf_contrato_single')
        ->name('contratos.pdf_single')
        ->middleware('permission:contratos.index');

    Route::GET('personals/contratos/{contrato}/finalizar', 'ContratosController@finalizar_contrato')
        ->name('contratos.finalizar')
        ->middleware('permission:contratos.index');

    Route::POST('personals/contratos/store/{id}', 'ContratosController@store')
        ->name('contratos.store')
        ->middleware('permission:contratos.create');

    Route::PUT('personals/contratos/update/{contrato}', 'ContratosController@update')
        ->name('contratos.update')
        ->middleware('permission:contratos.edit');

    Route::DELETE('personals/contratos/destroy/{contrato}', 'ContratosController@destroy')
        ->name('contratos.destroy')
        ->middleware('permission:contratos.destroy');

    // PAGOS EXTRA
    Route::GET('personals/pagos_extras/{id}', 'PagosExtraController@index')
        ->name('pagos_extras.index')
        ->middleware('permission:pagos_extras.index');

    Route::GET('personals/pagos_extras/create/{id}', 'PagosExtraController@create')
        ->name('pagos_extras.create')
        ->middleware('permission:pagos_extras.create');

    Route::GET('personals/pagos_extras/edit/{pagoExtra}', 'PagosExtraController@edit')
        ->name('pagos_extras.edit')
        ->middleware('permission:pagos_extras.edit');

    Route::GET('personals/pagos_extras/show/{pagoExtra}', 'PagosExtraController@show')
        ->name('pagos_extras.show')
        ->middleware('permission:pagos_extras.show');

    Route::GET('personals/pdf/pagos_extras/{id}', 'PagosExtraController@pdf_pagos_extra')
        ->name('pagos_extras.pdf')
        ->middleware('permission:pagos_extras.index');

    Route::POST('personals/pagos_extras/store/{id}', 'PagosExtraController@store')
        ->name('pagos_extras.store')
        ->middleware('permission:pagos_extras.create');

    Route::PUT('personals/pagos_extras/update/{pagoExtra}', 'PagosExtraController@update')
        ->name('pagos_extras.update')
        ->middleware('permission:pagos_extras.edit');

    Route::DELETE('personals/pagos_extras/destroy/{pagoExtra}', 'PagosExtraController@destroy')
        ->name('pagos_extras.destroy')
        ->middleware('permission:pagos_extras.destroy');

    // DESCUENTOS
    Route::GET('personals/descuentos/{id}', 'DescuentoController@index')
        ->name('descuentos.index')
        ->middleware('permission:descuentos.index');

    Route::GET('personals/descuentos/create/{id}', 'DescuentoController@create')
        ->name('descuentos.create')
        ->middleware('permission:descuentos.create');

    Route::GET('personals/descuentos/edit/{descuento}', 'DescuentoController@edit')
        ->name('descuentos.edit')
        ->middleware('permission:descuentos.edit');

    Route::GET('personals/descuentos/show/{descuento}', 'DescuentoController@show')
        ->name('descuentos.show')
        ->middleware('permission:descuentos.show');

    Route::GET('personals/pdf/descuentos/{id}', 'DescuentoController@pdf_descuentos')
        ->name('descuentos.pdf')
        ->middleware('permission:descuentos.index');

    Route::POST('personals/descuentos/store/{id}', 'DescuentoController@store')
        ->name('descuentos.store')
        ->middleware('permission:descuentos.create');

    Route::PUT('personals/descuentos/update/{descuento}', 'DescuentoController@update')
        ->name('descuentos.update')
        ->middleware('permission:descuentos.edit');

    Route::DELETE('personals/descuentos/destroy/{descuento}', 'DescuentoController@destroy')
        ->name('descuentos.destroy')
        ->middleware('permission:descuentos.destroy');

    // PAGOS
    Route::GET('personals/pagos/{id}', 'PagosController@index')
        ->name('pagos.index')
        ->middleware('permission:pagos.index');

    Route::GET('personals/pagos/create/{id}', 'PagosController@create')
        ->name('pagos.create')
        ->middleware('permission:pagos.create');

    Route::GET('personals/pagos/edit/{pago}', 'PagosController@edit')
        ->name('pagos.edit')
        ->middleware('permission:pagos.edit');

    Route::GET('personals/pagos/show/{pago}', 'PagosController@show')
        ->name('pagos.show')
        ->middleware('permission:pagos.show');

    Route::GET('personals/pdf/pagos/{id}', 'PagosController@pdf_pagos')
        ->name('pagos.pdf')
        ->middleware('permission:pagos.index');

    Route::GET('personals/pdf/boleta_pago/{id}/{mes}/{anio}', 'PagosController@boleta_pago')
        ->name('pagos.boleta')
        ->middleware('permission:pagos.index');

    Route::GET('personals/pdf/historial_pagos/{personal}', 'PagosController@historia_pagos')
        ->name('pagos.hitorial')
        ->middleware('permission:pagos.index');

    Route::POST('personals/pagos/store/{id}', 'PagosController@store')
        ->name('pagos.store')
        ->middleware('permission:pagos.create');

    Route::PUT('personals/pagos/update/{pago}', 'PagosController@update')
        ->name('pagos.update')
        ->middleware('permission:pagos.edit');

    Route::DELETE('personals/pagos/destroy/{pago}', 'PagosController@destroy')
        ->name('pagos.destroy')
        ->middleware('permission:pagos.destroy');

    // ASISTENCIAS
    Route::GET('personals/asistencias/{id}', 'AsistenciaController@index')
        ->name('asistencias.index')
        ->middleware('permission:asistencias.index');

    Route::GET('personals/asistencias/create/{id}', 'AsistenciaController@create')
        ->name('asistencias.create')
        ->middleware('permission:asistencias.create');

    Route::GET('personals/asistencias/edit/{asistencia}', 'AsistenciaController@edit')
        ->name('asistencias.edit')
        ->middleware('permission:asistencias.edit');

    Route::GET('personals/asistencias/show/{asistencia}', 'AsistenciaController@show')
        ->name('asistencias.show')
        ->middleware('permission:asistencias.show');

    Route::GET('personals/pdf/asistencias/{id}', 'AsistenciaController@pdf_asistencias')
        ->name('asistencias.pdf')
        ->middleware('permission:asistencias.index');

    Route::POST('personals/asistencias/store/{id}', 'AsistenciaController@store')
        ->name('asistencias.store')
        ->middleware('permission:asistencias.create');

    Route::PUT('personals/asistencias/update/{asistencia}', 'AsistenciaController@update')
        ->name('asistencias.update')
        ->middleware('permission:asistencias.edit');

    Route::DELETE('personals/asistencias/destroy/{asistencia}', 'AsistenciaController@destroy')
        ->name('asistencias.destroy')
        ->middleware('permission:asistencias.destroy');

    Route::POST('subirasistencias', 'AsistenciaController@subir_asistencias')
        ->name('asistencias.subir_asistencia')
        ->middleware('permission:asistencias.create');

    // HORARIOS
    Route::GET('horarios', 'HorarioController@index')
        ->name('horarios.index')
        ->middleware('permission:horarios.index');

    Route::get('horarios/config', 'HorarioController@config')
        ->name('horarios.config')
        ->middleware('permission:horarios.index');

    Route::GET('horarios/create/{area}', 'HorarioController@create')
        ->name('horarios.create')
        ->middleware('permission:horarios.create');

    Route::GET('horarios/edit/{horario}', 'HorarioController@edit')
        ->name('horarios.edit')
        ->middleware('permission:horarios.edit');

    Route::GET('horarios/show/{horario}', 'HorarioController@show')
        ->name('horarios.show')
        ->middleware('permission:horarios.show');

    Route::POST('horarios/store/{area}', 'HorarioController@store')
        ->name('horarios.store')
        ->middleware('permission:horarios.create');

    Route::PUT('horarios/update/{horario}', 'HorarioController@update')
        ->name('horarios.update')
        ->middleware('permission:horarios.edit');

    Route::DELETE('horarios/destroy/{horario}', 'HorarioController@destroy')
        ->name('horarios.destroy')
        ->middleware('permission:horarios.destroy');

    //REPORTES
    Route::GET('reportes', 'ReporteController@index')->name('reportes.index');

    Route::GET('reportes/usuarios', 'ReporteController@usuarios')->name('reportes.usuarios');

    Route::GET('reportes/asistencias/area', 'ReporteController@asistencias')->name('reportes.asistencias');

    Route::GET('reportes/planilla/area', 'ReporteController@planilla')->name('reportes.planillas');

    Route::GET('reportes/contrato', 'ReporteController@contratos')->name('reportes.contratos');
});
