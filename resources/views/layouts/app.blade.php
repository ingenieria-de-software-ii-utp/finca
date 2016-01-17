<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>:: FINCA :: @yield('title')</title>

    <!-- Fonts -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/lato.css') }}" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/finca.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css') }}">   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-table/bootstrap-table.min.css') }}">

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

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('compra.index') }}">Compras</a></li>
                    <li><a href="{{ route('insumo.index') }}">Insumos</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="{{ route('proveedor.index') }}">Proveedor</a></li>
                        <li><a href="{{ route('tipo-insumo.index') }}">Tipos de Insumos</a></li>
                        <li><a href="{{ route('tipo-raza.index') }}">Tipos de Razas</a></li>
                        <li><a href="{{ route('unidad.index') }}">Unidades</a></li>
                        <li><a href="{{ route('raza.index') }}">Razas</a></li>
                      </ul>
                    </li>
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table/locale/bootstrap-table-es-ES.min.js') }}"></script>
    @yield('scripts')
    <script type="text/javascript">
        var baseurl = '{{ url("/") }}';

        $('.datepicker').datepicker({
            format: "mm/dd/yyyy",
            language: "es",
            autoclose: true,
            todayHighlight: true
        });
    </script>
</body>
</html>
