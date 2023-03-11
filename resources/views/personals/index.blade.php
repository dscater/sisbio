@extends('layouts.inicio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/personal_report.css') }}">
    <style>
        a.btn.btn-success.descarga {
            position: absolute;
            right: 10px;
        }
    </style>
@endsection

@section('logo')
    <img src="{{ asset('imgs/' . $empresa->logo) }}" alt="logo">
@endsection

@section('content')
    @if (session('msg'))
        {!! session('msg') !!}
    @endif

    <div class="panel panel-default tabla">
        <div class="panel-heading">
            <a href="{{ route('personals.create') }}" class="btn btn-primary pull-right">Registrar personal</a>
            <a href="{{ route('personals.config_personal') }}" class="btn btn-success pull-right descarga">Configuración
                (.xsl)</a>
            <h4>Personal</h4>
        </div>
        <div class="panel-body">
            <div class="row" id="buscador">
                <input type="text" class="url_index" value="{{ route('personals.index') }}" hidden>
                <div class="col-md-12">
                    <h4><i class="fa fa-search"></i> Buscar personal:</h4>
                </div>
                <div class="col-md-3 col-xs-4">
                    <input type="text" class="form-control nombre" placeholder="Nombre">
                </div>
                <div class="col-md-3 col-xs-4">
                    <input type="text" class="form-control apellido" placeholder="Apellido paterno">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lista_personals">
                    <p>Numero de registros: {{ $personals->total() }}. Página: {{ $personals->currentPage() }} de
                        {{ $personals->lastPage() }}</p>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Apellidos y Nombre(s)</th>
                                <th>C.I.</th>
                                <th>Género</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Profesión</th>
                                <th>Foto</th>
                                <th colspan="6" class="iconos">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($personals->count() > 0)
                                @foreach ($personals as $personal)
                                    <tr>
                                        <td class="nombre_registro">{{ $personal->apep }} {{ $personal->apem }}
                                            {{ $personal->name }}</td>
                                        <td>{{ $personal->ci }} {{ $personal->ci_exp }}</td>
                                        <td>{{ $personal->genero }}</td>
                                        <td>{{ $personal->cel }}</td>
                                        <td>{{ $personal->email ?: '(Sin email)' }}</td>
                                        <td>{{ $personal->profesion }}</td>
                                        <td><img src="{{ asset('imgs/' . $personal->foto) }}" alt="foto" width="90"
                                                height="90"></td>
                                        <td class="reporte">
                                            <a href="{{ route('personals.curriculum', $personal->id) }}" target="_blank">
                                                <img class="reporte" src="{{ asset('imgs/curriculum.png') }}"
                                                    alt="" title="Curriculum">
                                                <p>Curriculum</p>
                                            </a>
                                        </td>
                                        <td class="reporte">
                                            <a href="{{ route('personals.historia', $personal->id) }}" target="_blank">
                                                <img class="reporte" src="{{ asset('imgs/historia.png') }}" alt=""
                                                    title="Historia">
                                                <p>Historia</p>
                                            </a>
                                        </td>
                                        <td width="2px" class="iconos"><a
                                                href="{{ route('personals.show', $personal->id) }}" title="Ver"><i
                                                    class="fa fa-eye"></i></a></td>
                                        <td width="2px" class="iconos"><a
                                                href="{{ route('personals.pdf', $personal->id) }}" target="_blank"
                                                title="Formulario de registro"><i class="fa fa-file-pdf"></i></a></td>
                                        <td width="2px" class="iconos"><a
                                                href="{{ route('personals.edit', $personal->id) }}" title="Modificar"><i
                                                    class="fa fa-edit"></i></a></td>
                                        <td width="2px" class="iconos">
                                            <a href="#" data-toggle="modal" data-target="#modal_eliminar"
                                                class="eliminar" title="Eliminar">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                            <input type="text" value="{{ route('personals.destroy', $personal->id) }}"
                                                class="ruta_eliminar" hidden>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100px">No se encontro ningún registro</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $personals->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('personals.modal.eliminar')

@endsection

@section('scripts')
    <script src="{{ asset('js/eliminar.js') }}"></script>
    <script src="{{ asset('js/buscar_personal.js') }}"></script>
@endsection
