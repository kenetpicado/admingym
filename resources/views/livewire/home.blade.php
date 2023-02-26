@section('title', 'Inicio')

<div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Clientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $generalInfo['clientes_count'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Planes
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $generalInfo['planes_count'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Ingresos {{ date('M') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $generalInfo['ingresos_total'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Egresos {{ date('M') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $generalInfo['egresos_total'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Ganancia {{ date('M') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $generalInfo['ganancia_total'] }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Becas {{ date('M') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $generalInfo['becas_total'] }}
                                ({{ $generalInfo['becas_count'] }})
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sexo</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="sexoChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Servicios</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="serviciosChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')

        <script src="{{ asset('js/chart.js/chart-doughnut.js') }}"></script>
        <script src="{{ asset('js/chart.js/chart-area.js') }}"></script>

        <script>
            const pluck = (arr, key) => arr.map((i) => i[key]);

            var clientes = @json($clientes);
            var planes = @json($planes);

            draw_doughnut_graph(
                pluck(planes, 'servicio'),
                pluck(planes, 'total'),
                "serviciosChart"
                );

            draw_doughnut_graph(
                pluck(clientes, 'sexo'),
                pluck(clientes, 'total'),
                "sexoChart"
                );
        </script>
    @endpush
</div>


