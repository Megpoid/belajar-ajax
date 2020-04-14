<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('layouts/master/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('layouts/master/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('layouts/master/vendor/sweetalert/sweetalert.css') }}">
    @yield('css')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('layouts.components.master.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            @include('layouts.components.master.navbar')
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('layouts/master/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('layouts/master/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('layouts/master/vendor/sweetalert/sweetalert.min.js') }}"></script>

    @yield('js')
</body>
</html>
