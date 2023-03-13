<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#178028">
    <title>SISBIO</title>
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.7/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/fontawesome/css/all.min.css') }}">
    @yield('css')

</head>

<body>
    <div id="pagina_carga">
        <img src="{{ asset('imgs/carga.gif') }}">
    </div>

    <nav class="navegacion_princial">
        <div class="boton-toggle">
            <span class="span-1"></span>
            <span class="span-2"></span>
            <span class="span-3"></span>
        </div>
        <ul class="menu_user notificaciones">
            <li class="notificaciones" id="contenedor_notificaciones">

            </li>
            <li>
                <a href="#" onclick="event.preventDefault();">
                    @if (Auth::user()->datos_usuario)
                        <img src="{{ asset('imgs/' . Auth::user()->datos_usuario->foto) }}" alt="">
                        {{ Auth::user()->datos_usuario->name }} {{ Auth::user()->datos_usuario->apep }}
                        {{ Auth::user()->datos_usuario->apem }}
                    @else
                        <img src="{{ asset('imgs/user.png') }}" alt="">
                        {{ Auth::user()->name }}
                    @endif
                    <span><i class="fa fa-caret-down"></i></span>
                </a>
                <ul class="sub-menu-user oculto">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                            <span><i class="fa fa-power-off"></i></span> Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('users.config', Auth::user()->id) }}"><span><i class="fa fa-cog"></i></span>
                            Configuración</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="main">
        <div id="fondo_menu">
            <div id="contenedor_menu">
                <div class="boton-toggle2">
                    <span class="span-1"></span>
                    <span class="span-2"></span>
                    <span class="span-3"></span>
                </div>
                <div id="logo">
                    @yield('logo')
                </div>
                <div id="titulo_menu">
                    Menú
                </div>
                <div id="menu">
                    <ul class="lista-menu">
                        <li class="{{ request()->is('home') ? 'activado' : '' }}">
                            <a href="{{ route('home') }}"><span><i class="fa fa-home"></i></span> Inicio</a>
                        </li>
                        @can('users.index')
                            <li class="{{ request()->is('users*') ? 'activado' : '' }}">
                                <a href="{{ route('users.index') }}"><span><i class="fa fa-users"></i></span> Usuarios</a>
                            </li>
                        @endcan
                        @can('cargos.index')
                            <li class="{{ request()->is('cargos*') ? 'activado' : '' }}">
                                <a href="{{ route('cargos.index') }}"><span><i class="fa fa-sitemap"></i></span>Cargos</a>
                            </li>
                        @endcan
                        @can('areas.index')
                            <li class="{{ request()->is('areas*') ? 'activado' : '' }}">
                                <a href="{{ route('areas.index') }}"><span><i
                                            class="fa fa-clipboard-list"></i></span>Unidad / Áreas</a>
                            </li>
                        @endcan
                        @can('personals.index')
                            <li
                                class="contenedor-sub-menu {{ request()->is('personal*') ? 'activado' : '' }} {{ request()->is('personal*') || request()->is('asistencias*') || request()->is('formacion*') || request()->is('especializacion*') || request()->is('experiencia*') || request()->is('contratos*') || request()->is('pagos_extras*') || request()->is('descuentos*') || request()->is('pagos*') ? 'activado abierto' : '' }}">
                                <a href="#"><span><i class="fa fa-users"></i></span>Personal <span class="flecha"><i
                                            class="fa fa-caret-down"></i></span></a>
                                <ul class="sub-menu {{ request()->is('personal*') || request()->is('asistencias*') || request()->is('formacion*') || request()->is('especializacion*') || request()->is('experiencia*') || request()->is('contratos*') || request()->is('pagos_extras*') || request()->is('descuentos*') || request()->is('pagos*') ? '' : 'oculto' }}"
                                    id="opciones_personal">
                                    @can('personals.index')
                                        <li
                                            class="{{ request()->is('personals') ? 'activado' : '' }} {{ request()->is('personals/show*') ? 'activado' : '' }} {{ request()->is('personals/create*') ? 'activado' : '' }} {{ request()->is('personals/edit*') ? 'activado' : '' }}">
                                            <a href="{{ route('personals.index') }}"><span><i
                                                        class="fa fa-edit"></i></span>Administrar personal</a>
                                        </li>
                                    @endcan
                                    @can('asistencias.index')
                                        <li class="{{ request()->is('personals/asistencia*') ? 'activado' : '' }}">
                                            <a name="asistencia" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-clock"></i></span>Registrar asistencia</a>
                                        </li>
                                    @endcan
                                    @can('formacion.index')
                                        <li class="{{ request()->is('personals/formacion*') ? 'activado' : '' }}">
                                            <a name="formacion" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-user-graduate"></i></span>Administrar formación
                                                académica</a>
                                        </li>
                                    @endcan
                                    @can('especializacion.index')
                                        <li class="{{ request()->is('personals/especializacion*') ? 'activado' : '' }}">
                                            <a name="especializacion" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-diagnoses"></i></span>Administrar especializaciones</a>
                                        </li>
                                    @endcan
                                    @can('experiencia.index')
                                        <li class="{{ request()->is('personals/experiencia*') ? 'activado' : '' }}">
                                            <a name="experiencia" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-file-alt"></i></span>Administrar experiencia laboral</a>
                                        </li>
                                    @endcan
                                    @can('contratos.index')
                                        <li class="{{ request()->is('personals/contrato*') ? 'activado' : '' }}">
                                            <a name="contrato" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-list-alt"></i></span>Administrar contratos</a>
                                        </li>
                                    @endcan
                                    @can('pagos_extras.index')
                                        <li class="{{ request()->is('personals/pagos_extra*') ? 'activado' : '' }}">
                                            <a name="pagos_extra" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-money-bill"></i></span>Administrar pagos extra</a>
                                        </li>
                                    @endcan
                                    @can('descuentos.index')
                                        <li class="{{ request()->is('personals/descuentos*') ? 'activado' : '' }}">
                                            <a name="descuento" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-money-bill"></i></span>Administrar descuentos</a>
                                        </li>
                                    @endcan
                                    @can('pagos.index')
                                        <li class="{{ request()->is('personals/pagos/*') ? 'activado' : '' }}">
                                            <a name="pago" href="#" class="obtener_personal"><span><i
                                                        class="fa fa-hand-holding-usd"></i></span>Administrar pagos</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('horarios.index')
                            <li class="{{ request()->is('horarios*') ? 'activado' : '' }}">
                                <a href="{{ route('horarios.index') }}"><span><i
                                            class="fa fa-clock"></i></span>Horarios</a>
                            </li>
                        @endcan
                        <li class="{{ request()->is('notificacions*') ? 'activado' : '' }}">
                            <a href="{{ route('notificacions.index') }}"><span><i
                                        class="fa fa-bell"></i></span>Notificación de asistencias</a>
                        </li>
                        <li class="{{ request()->is('reportes*') ? 'activado' : '' }}">
                            <a href="{{ route('reportes.index') }}"><span><i
                                        class="fa fa-file-pdf"></i></span>Reportes
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="contenido_pagina">
            @yield('content')
            @include('personals.modal.identificar')
        </div>

        <input type="text" value="{{ csrf_token() }}" id="token" hidden>
        <input type="text" value="{{ asset('') }}" id="public" hidden>
        <input type="text" value="{{ route('notificacion_users.index') }}" id="urlNotificacionesUsuario" hidden>
        <input type="text" value="{{ route('notificacion_users.nuevos') }}" id="urlNuevasNotificacionesUsuario"
            hidden>

    </div>

    <script src="{{ asset('lib/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('lib/bootstrap-3.3.7/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/inicio.js') }}"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    {{-- scrip para obtener las Asistencias y Notificaciones --}}
    <script src="{{ asset('js/notificaciones.js') }}"></script>
    <script src="{{ asset('js/obtener_personal.js') }}"></script>
    @yield('scripts')
</body>

</html>
