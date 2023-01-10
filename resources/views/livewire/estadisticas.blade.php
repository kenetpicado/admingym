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
                        <canvas id="ingresos2022"></canvas>
                    </div>
                    <hr>
                    Ingresos mensuales del año 2022
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        const pluck = (arr, key) => arr.map((i) => i[key]);
        var ingresos = <?php echo $ingresos; ?>;

        const tooltip = {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 5,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            intersect: false,
            callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                }
            }
        };

        const scale = {
            xAxes: [{
                time: {
                    unit: 'month'
                },
                gridLines: {
                    display: false,
                    drawBorder: true
                },
                ticks: {
                    maxTicksLimit: 12,
                },
                maxBarThickness: 20,
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 12,
                    padding: 0,
                    callback: function(value, index, values) {
                        return 'C$ ' + number_format(value);
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: true,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                },
            }]
        }

        const option = {
            maintainAspectRatio: true,
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0
                }
            },
            scales: scale,
            legend: {
                display: false
            },
            tooltips: tooltip,

        }

        function number_format(number, decimals, dec_point, thousands_sep) {
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        draw_bars(
            'ingresos2022',
            pluck(ingresos, 'total'),
            pluck(ingresos, 'mes'),
        );

        function draw_bars(id, data, label,  color = "#4e73df") {
            var ctx = document.getElementById(id);
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: "Monto",
                        backgroundColor: color,
                        data: data,
                    }],
                },
                options: option
            });
        }
</script>
@endpush
</div>


