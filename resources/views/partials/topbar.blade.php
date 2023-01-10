<nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm static-top">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-primary" href="/">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('clientes*') ? 'active' : '' }}"
                        href="{{ route('clientes') }}">Clientes</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('planes*') ? 'active' : '' }}"
                        href="{{ route('planes') }}">Planes</a>
                </li>
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Administracion
                    </a>
                    <div class="dropdown-menu mx-1">
                        <a class="dropdown-item" href="{{ route('personal') }}">Personal</a>
                        <a class="dropdown-item" href="{{ route('precios') }}">Precios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('contabilidad') }}">Contabilidad</a>
                    </div>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link {{ request()->is('estadisticas*') ? 'active' : '' }}"
                        href="{{ route('estadisticas') }}">Estadisticas</a>
                </li>
            </ul>

            <div class="nav-item mx-1">
                <a class="nav-link" href="{{ route('reportes') }}">
                    <i class="fas fa-bell fa-fw"></i>
                </a>
            </div>

            <div class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('perfil') }}">Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>
