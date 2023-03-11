<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SISBIO</title>

    <link rel="stylesheet" href="{{ asset('lib/bootstrap-3.3.7/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('lib/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
      <div id="pagina_carga">
        <img src="{{ asset('imgs/carga.gif') }}">
      </div>

    @yield('content')

    <script src="{{ asset('lib/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('lib/bootstrap-3.3.7/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/inicio.js') }}"></script>
</body>
</html>
