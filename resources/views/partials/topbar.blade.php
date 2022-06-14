<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        @if (isset($reportes))
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    @if (count($reportes) > 0)
                        <span class="badge badge-danger badge-counter">
                            {{-- {{ count($reportes) }} --}}
                            +{{ $inspected->status }}
                        </span>
                    @endif
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown" style="height:500px; overflow-y: scroll;">
                    <h6 class="dropdown-header">Planes expirados</h6>

                    <a class="dropdown-item text-center small text-gray-500" href="{{ route('reportes.index') }}">
                        VER TODAS</a>

                    @if (count($reportes) > 0)
                        @foreach ($reportes as $reporte)
                            <div class="dropdown-item d-flex align-items-center ">
                                <div class="mr-2">
                                    <a href="{{ route('reporte.destroy', $reporte->id) }}"
                                        class="btn btn-sm btn-circle bg-danger">
                                        <i class="fas fa-trash text-white"></i>
                                    </a>
                                </div>
                                <div>
                                    <div class="small text-gray-500">
                                        {{ $reporte->created_at }}
                                    </div>
                                    <a href="{{ route('planes.create', $reporte->cliente_id) }}"
                                        class="text-gray-800">
                                        {{ $reporte->cliente->nombre }}
                                        <small>({{ $reporte->mensaje }})</small>

                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <a class="dropdown-item text-center small text-gray-500" href="" data-toggle="modal"
                            data-target="#eliminarTodo">Borrar todo</a>
                    @else
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-danger">
                                    <i class="fas fa-exclamation text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">{{ date('Y-m-d') }}</div>
                                <span class="font-weight-bold">No hay notificaciones</span>
                            </div>
                        </a>
                        <div class="dropdown-item text-center small text-gray-500">Vacio</div>
                    @endif
                </div>
            </li>
        @endif

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    @if (Auth::user())
                        {{ Auth::user()->name }}
                    @endif
                </span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
