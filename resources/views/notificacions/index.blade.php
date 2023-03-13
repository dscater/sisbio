@extends('layouts.inicio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/notificacion_report.css') }}">
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
        <div class="panel-body">
            {{-- <div class="row" id="buscador">
                <input type="text" class="url_index" value="{{ route('notificacions.index') }}" hidden>
                <div class="col-md-12">
                    <h4><i class="fa fa-search"></i> Buscar notificacion:</h4>
                </div>
                <div class="col-md-3 col-xs-4">
                    <input type="text" class="form-control nombre" placeholder="Nombre">
                </div>
                <div class="col-md-3 col-xs-4">
                    <input type="text" class="form-control apellido" placeholder="Apellido paterno">
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12 lista_notificacions">
                    <p>Numero de registros: {{ $notificacions->total() }}. Página: {{ $notificacions->currentPage() }} de
                        {{ $notificacions->lastPage() }}</p>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Personal</th>
                                <th>Foto</th>
                                <th>Detalle</th>
                                {{-- <th colspan="1" class="iconos">Opciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($notificacions->count() > 0)
                                @foreach ($notificacions as $notificacion)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($notificacion->fecha)) }}</td>
                                        <td>{{ $notificacion->hora }}</td>
                                        <td>{{ $notificacion->asistencia->personal->full_name }}</td>
                                        <td><img src="{{ asset('imgs/' . $notificacion->asistencia->personal->foto) }}"
                                                alt="foto" width="90" height="90"></td>
                                        <td>{{ $notificacion->detalle }}<br><strong><small>{{ $notificacion->created_at->diffForHumans() }}</small></strong>
                                        </td>
                                        {{-- <td width="2px" class="iconos"><a
                                                href="{{ route('notificacions.show', $notificacion->id) }}"
                                                title="Ver"><i class="fa fa-eye"></i></a></td> --}}
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
                            {{ $notificacions->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection
