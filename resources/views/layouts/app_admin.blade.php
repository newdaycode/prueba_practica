<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--Cabecera del sitio-->
    @include('layouts.head')
    <link href="{{ asset('assets') }}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/sb-admin-2.css" rel="stylesheet">
    <!--css extra de cada seccion-->
    @yield('css')
</head>
<body id="page-top">
    <!--Verifica si esta logueado para mostra la vista-->
    @auth()
        @include('layouts.page_templates.auth')
    @endauth
    @guest()
        @include('layouts.page_templates.guest')
    @endguest
    <script src="{{ asset('assets') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('vendor') }}/sweetalert/sweetalert.all.js"></script>
    <!--js extra de cada seccion-->
    @yield('js')   
</body>
</html>
