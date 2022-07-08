<ul class="navbar-nav bg-primary sidebar sidebar-dark">

    <div class="position-fixed">
        <li class="nav-item active">
            <div class="nav-link">
                <i class="fas fa-fw fa-home"></i>
                <span>{{ config('app.name') }}</span>
            </div>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Inicio</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item {{ request()->is('clientes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('clientes.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Clientes</span></a>
        </li>

        <li class="nav-item {{ request()->is('planes*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('planes.index') }}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Planes activos</span></a>
        </li>

        <li class="nav-item {{ request()->is('ingresos*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('ingresos.index') }}">
                <i class="fas fa-fw fa-coins"></i>
                <span>Ingresos</span></a>
        </li>

        <li class="nav-item {{ request()->is('egresos*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('egresos.index') }}">
                <i class="fas fa-fw fa-coins"></i>
                <span>Egresos</span></a>
        </li>

        <li class="nav-item {{ request()->is('entrenador*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('entrenador.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Entrenadores</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Ajustes
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('precios.index') }}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Precios</span></a>
        </li>
    </div>
</ul>
