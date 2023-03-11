@extends('layouts.inicio')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/reportes.css') }}">
@endsection

@section('logo')
  <img src="{{ asset('imgs/'.$empresa->logo) }}" alt="logo">
@endsection

@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Reportes</h3>
      </div>

      <div class="panel-body">
        <div id="menu_home">
          <ul class="lista-menu">
            <li class="azul">
              <a href="{{ route('reportes.usuarios') }}" target="_blank"><span><i class="fa fa-users"></i></span>Usuarios</a>
            </li>
            <li class="azul">
              <a href="#" data-toggle="modal" data-target="#asistencias"><span><i class="fa fa-file-pdf"></i></span>Asistencias por unidad y/o área</a>
            </li>
            <li class="azul">
              <a href="#" data-toggle="modal" data-target="#planilla" ><span><i class="fa fa-file-pdf"></i></span>Planilla de sueldos y salarios</a>
            </li>
            <li class="azul">
              <a href="#" data-toggle="modal" data-target="#filtro_contrato" ><span><i class="fa fa-list"></i></span>Personal por contrato</a>
            </li>
          </ul>
        </div>
      </div>

  </div>
  @include('reportes.modal.asistencias')
  @include('reportes.modal.planilla')
  @include('reportes.modal.filtro_contrato')
@endsection

@section('scripts')
  <script src="{{ asset('js/menu_home.js') }}"></script>
  <script src="{{ asset('js/obtener_personal_home.js') }}"></script>
@endsection
