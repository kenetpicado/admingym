@section('title', 'Estadisticas')

<div>
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <!-- Ingresos -->
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
    var ingresos = @json($ingresos);

    draw_area_graph(
        pluck(ingresos, 'mes'),
        pluck(ingresos, 'total'),
        "chartIngresos2022",
        "Ingresos",
        "C$ "
        );
</script>
@endpush
</div>


