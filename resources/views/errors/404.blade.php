<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>No se encuentra</title>

    <!-- Fonts -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/lato.css') }}" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/finca.css') }}"> 
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Finca
                </a>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Lo sentimos, no se encuentra disponible. </h2>
        <a href="{{ url('/') }}" class="btn btn-link"><i class="fa fa-btn fa-arrow-left"></i>Regresar </a>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
