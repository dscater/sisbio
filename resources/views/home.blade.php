@extends('layouts.inicio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu_home.css') }}">
@endsection

@section('logo')
    <img src="{{ asset('imgs/' . $empresa->logo) }}" alt="logo">
@endsection

@section('content')
    <div class="panel panel-default titulo_empresa">
        <div class="panel-body">
            <h1>{{ $empresa->name }}</h1>
        </div>
    </div>

    <div class="alert alert-success bienvenida">
        <button class="close" data-dismiss="alert">&times;</button>
        <strong>BIENVENIDO</strong>
    </div>
    <div class="panel panel-default menu">
        <div class="panel-heading">
            <h3>Menú</h3>
        </div>

        <div class="panel-body">
            <div id="menu_home">
                <ul class="lista-menu">
                    <li class="verde {{ request()->is('home') ? 'activado' : '' }}">
                        <a href="{{ route('home') }}"><span><i class="fa fa-home"></i></span> Inicio</a>
                    </li>
                    @can('users.index')
                        <li class="verde {{ request()->is('users*') ? 'activado' : '' }}">
                            <a href="{{ route('users.index') }}"><span><i class="fa fa-users"></i></span> Usuarios</a>
                        </li>
                    @endcan

                    @can('cargos.index')
                        <li class="verde {{ request()->is('cargos*') ? 'activado' : '' }}">
                            <a href="{{ route('cargos.index') }}"><span><i class="fa fa-sitemap"></i></span>Cargos</a>
                        </li>
                    @endcan
                    @can('areas.index')
                        <li class="celeste {{ request()->is('areas*') ? 'activado' : '' }}">
                            <a href="{{ route('areas.index') }}"><span><i class="fa fa-clipboard-list"></i></span>Unidad /
                                Áreas</a>
                        </li>
                    @endcan
                    @can('personal.index')
                        <li class="celeste contenedor-sub-menu {{ request()->is('personal*') ? 'activado' : '' }}">
                            <a href="#"><span><i class="fa fa-users"></i></span>Personal <span class="flecha"><i
                                        class="fa fa-caret-down"></i></span></a>
                            <ul class="sub-menu oculto celeste" id="opciones_personal_home">
                                <li
                                    class="{{ request()->is('personals') ? 'activado' : '' }} {{ request()->is('personals/show*') ? 'activado' : '' }} {{ request()->is('personals/create*') ? 'activado' : '' }} {{ request()->is('personals/edit*') ? 'activado' : '' }}">
                                    <a href="{{ route('personals.index') }}"><span><i class="fa fa-edit"></i></span>Administrar
                                        personal</a>
                                </li>
                                <li class="{{ request()->is('personals/asistencia*') ? 'activado' : '' }}">
                                    <a name="asistencia" href="#" class="obtener_personal"><span><i
                                                class="fa fa-clock"></i></span>Registrar asistencia</a>
                                </li>
                                <li class="{{ request()->is('personals/formacion*') ? 'activado' : '' }}">
                                    <a name="formacion" href="#" class="obtener_personal"><span><i
                                                class="fa fa-user-graduate"></i></span>Administrar formación académica</a>
                                </li>
                                <li class="{{ request()->is('personals/especializacion*') ? 'activado' : '' }}">
                                    <a name="especializacion" href="#" class="obtener_personal"><span><i
                                                class="fa fa-diagnoses"></i></span>Administrar especializaciones</a>
                                </li>
                                <li class="{{ request()->is('personals/experiencia*') ? 'activado' : '' }}">
                                    <a name="experiencia" href="#" class="obtener_personal"><span><i
                                                class="fa fa-file-alt"></i></span>Administrar experiencia laboral</a>
                                </li>
                                <li class="{{ request()->is('personals/contrato*') ? 'activado' : '' }}">
                                    <a name="contrato" href="#" class="obtener_personal"><span><i
                                                class="fa fa-list-alt"></i></span>Administrar contratos</a>
                                </li>
                                <li class="{{ request()->is('personals/pagos_extra*') ? 'activado' : '' }}">
                                    <a name="pagos_extra" href="#" class="obtener_personal"><span><i
                                                class="fa fa-money-bill"></i></span>Administrar pagos extra</a>
                                </li>
                                <li class="{{ request()->is('personals/descuentos*') ? 'activado' : '' }}">
                                    <a name="descuento" href="#" class="obtener_personal"><span><i
                                                class="fa fa-money-bill"></i></span>Administrar descuentos</a>
                                </li>
                                <li class="{{ request()->is('personals/pagos/*') ? 'activado' : '' }}">
                                    <a name="pago" href="#" class="obtener_personal"><span><i
                                                class="fa fa-hand-holding-usd"></i></span>Administrar pagos</a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('horarios.index')
                        <li class="celeste">
                            <a href="{{ route('horarios.index') }}"><span><i class="fa fa-clock"></i></span>Horarios</a>
                        </li>
                    @endcan
                    @can('reportes.index')
                        <li class="azul">
                            <a href="{{ route('reportes.index') }}"><span><i class="fa fa-file-pdf"></i></span>Reportes</a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>

    </div>

    <div class="panel panel-default menu">
        <div class="panel-body">
            <div id="hora">

            </div>
            @include('parcials.selec_asistencia')
            <div id="mensajes">
                @if (session('msg'))
                    {!! session('msg') !!}
                @endif
                @if (session('error'))
                    {!! session('error') !!}
                @endif
            </div>
            <div id="c_asistencia">
                <a href="#" data-toggle="modal" data-target="#selec_asis" class="btn btn-warning"> <i
                        class="fa fa-file-import"></i> Cargar asistencia</a>
            </div>
            <div class="contenedor_asistencias">
                <div class="contenedor_maniana">
                    @if ($ultima_asistencia != null)
                        <h2 style="text-align:center;">ASISTENCIA</h2>
                        <div class="maniana">
                            <div class="ingreso">
                                <table border="2">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="area">
                                                @if ($contrato)
                                                    {{ $array_areas[$contrato->unidad_areas_id] }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="columna_maniana">Mañana</td>
                                            <td colspan="2" class="columna_tarde">Tarde</td>
                                        </tr>
                                        <tr>
                                            @if ($contrato_area_horario)
                                                <td class="contenido_maniana">
                                                    {{ date('G:i', strtotime($contrato_area_horario->ingreso_maniana)) }}
                                                </td>
                                                <td class="contenido_maniana">
                                                    {{ date('G:i', strtotime($contrato_area_horario->salida_maniana)) }}
                                                </td>
                                                <td class="contenido_tarde">
                                                    {{ date('G:i', strtotime($contrato_area_horario->ingreso_tarde)) }}
                                                </td>
                                                <td class="contenido_tarde">
                                                    {{ date('G:i', strtotime($contrato_area_horario->salida_tarde)) }}</td>
                                            @else
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="contenido_horario">Horario no configurado</td>
                                        </tr>
                    @endif
                    <tr>
                        <td colspan="5"><img src="{{ asset('imgs/' . $ultima_asistencia->personal->foto) }}"
                                alt="foto">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="personal"><span><i class="fa fa-user"></i></span>
                            {{ $ultima_asistencia->personal->name }} {{ $ultima_asistencia->personal->apep }}
                            {{ $ultima_asistencia->personal->apem }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="columna_maniana">Mañana</td>
                        <td colspan="2" class="columna_tarde">Tarde</td>
                    </tr>
                    <tr>
                        @if ($ultima_asistencia->ingreso_maniana)
                            <td class="contenido_maniana">
                                {{ date('G:i', strtotime($ultima_asistencia->ingreso_maniana)) }}
                            </td>
                        @else
                            <td class="contenido_maniana">S/R</td>
                        @endif
                        @if ($ultima_asistencia->salida_maniana)
                            <td class="contenido_maniana">{{ date('G:i', strtotime($ultima_asistencia->salida_maniana)) }}
                            </td>
                        @else
                            <td class="contenido_maniana">S/R</td>
                        @endif
                        @if ($ultima_asistencia->ingreso_tarde)
                            <td class="contenido_tarde">{{ date('G:i', strtotime($ultima_asistencia->ingreso_tarde)) }}
                            </td>
                        @else
                            <td class="contenido_tarde">S/R</td>
                        @endif
                        @if ($ultima_asistencia->salida_tarde)
                            <td class="contenido_tarde">{{ date('G:i', strtotime($ultima_asistencia->salida_tarde)) }}
                            </td>
                        @else
                            <td class="contenido_tarde">S/R</td>
                        @endif
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        @else
            NO EXISTEN REGISTROS.
            @endif
        </div>
    </div>
    </div>
    </div>
    <input type="text" value="{{ route('home.asistencias') }}" id="url_asistencias_nuevas" hidden>
@endsection

@section('scripts')
    <script src="{{ asset('js/obtener_personal_home.js') }}"></script>
    <script src="{{ asset('js/menu_home.js') }}"></script>
@endsection
