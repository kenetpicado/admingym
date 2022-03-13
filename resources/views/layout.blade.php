<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Alonso Gym - @yield('title')</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">

    <!-- Datatable -->
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}" >
</head>

<body>

    <!--Preloader start-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <!--Main wrapper-->
    <div id="main-wrapper">
        <div class="nav-header">
            <a href="" class="brand-logo">
                ALONSO GYM
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>

        <!--Header-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                    <small>{{ Auth::user()->name }}</small>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!--Sidebar-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="" href="/">
                            <i class="icon icon-home"></i>
                            <span class="nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-label first">CLIENTES</li>
                    <li>
                        <a class="" href="{{route('clientes.create')}}">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Agregar cliente</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{route('clientes.index')}}">
                            <i class="icon icon-form"></i>
                            <span class="nav-text">Ver clientes</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{route('actives')}}">
                            <i class="icon icon-plug"></i>
                            <span class="nav-text">Planes activos</span>
                        </a>
                    </li>
                    <li class="nav-label first">Administración</li>
                    <li>
                        <a class="" href="{{route('caja.index')}}">
                            <i class="icon icon-single-copy-06"></i>
                            <span class="nav-text">Caja</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{route('reportes.index')}}">
                            <i class="icon icon-single-copy-06"></i>
                            <span class="nav-text">Reportes</span></a>
                    </li>
                    <li class="nav-label first">Entrenadores</li>
                    <li>
                        <a class="" href="{{route('entrenador.create')}}">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Agregar entrenador</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{route('entrenador.index')}}">
                            <i class="icon icon-form"></i>
                            <span class="nav-text">Ver entrenadores</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>


        @yield('contenido')

    </div>

    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/quixnav-init.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>

    <!-- Datatable -->
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

</body>

</html>
