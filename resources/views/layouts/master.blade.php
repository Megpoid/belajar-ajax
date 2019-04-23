<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}"> <!-- Important to work AJAX CSRF -->

    <link rel="stylesheet" href="{{ asset('css/darkly-bootstrap.min.css') }}" media="screen">

    @yield('css')

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:void(0);">Ajax Modal Demo</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ajaxscript.js') }}"></script>

    @yield('js')

</body>

</html>
