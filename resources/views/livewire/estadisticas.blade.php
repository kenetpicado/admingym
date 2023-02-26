@section('title', 'Estadisticas')

<div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Planes contratados en los ultimos 10 dias</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="plansLastDaysChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ingresos 2022</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="chartIngresos2022"></canvas>
                    </div>
                    <hr>
                    Ingresos mensuales del año 2022
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/chart.js/chart-area.js') }}"></script>

        <script>
            const pluck = (arr, key) => arr.map((i) => i[key]);
            const plansLastDays = @json($plansLastDays);

            const meses = ['ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
            const ingresos = [4650, 58600, 73000, 59900, 64400, 62500, 54600, 46700];

            draw_area_graph(
                pluck(plansLastDays, 'day').reverse(),
                pluck(plansLastDays, 'total').reverse(),
                "plansLastDaysChart",
                "Planes contratados"
            );

            draw_area_graph(
                meses,
                ingresos,
                "chartIngresos2022",
                "Ingresos",
                "C$ "
            );
        </script>
    @endpush
</div>


