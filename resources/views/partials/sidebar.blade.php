<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <i class="fas fa-dumbbell"></i>
            
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - clientes -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('clientes.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('planes.index') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Planes activos</span></a>
    </li>

    <!-- Nav Item - entrenadores -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ingreso.index') }}">
            <i class="fas fa-fw fa-coins"></i>
            <span>Ingresos</span></a>
    </li>

    <!-- Nav Item - entrenadores -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('egresos.index') }}">
            <i class="fas fa-fw fa-coins"></i>
            <span>Egresos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
