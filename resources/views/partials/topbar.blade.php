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

            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>

                    @if (count($reportes) > 0)
                        <span class="badge badge-danger badge-counter">
                            +{{ $inspected->status }}
                        </span>
                    @endif
                </a>

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Reportes</h6>


                    @if (count($reportes) > 0)
                        <div class="" style="max-height:350px; overflow-y: scroll;">
                            @foreach ($reportes as $reporte)
                                <div class="dropdown-item d-flex align-items-center ">
                                    <div class="mr-2">
                                        <form action="{{ route('reportes.destroy', $reporte->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash text-white"></i>
                                            </button>
                                        </form>
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
                        </div>
                        <a class="dropdown-item text-center small text-gray-800" href="{{ route('reportes.index') }}">Ver todo</a>
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
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
