function draw_area_graph(labels, data, id, text, simbol = '')
{
	var element = document.getElementById(id);
	var chart = new Chart(element, {
		type: 'line',
		data: {
			labels: labels,
			datasets: [{
				label: text,
				lineTension: 0.3,
				backgroundColor: "rgba(78, 115, 223, 0.2)",
				borderColor: "rgba(78, 115, 223, 1)",
				pointRadius: 3,
				pointBackgroundColor: "rgba(78, 115, 223, 1)",
				pointBorderColor: "rgba(78, 115, 223, 1)",
				pointHoverRadius: 3,
				pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
				pointHoverBorderColor: "rgba(78, 115, 223, 1)",
				pointHitRadius: 10,
				pointBorderWidth: 4,
				data: data,
			}],
		},
		options: {
			maintainAspectRatio: true,
			layout: {
				padding: {
					left: 10,
					right: 30,
					top: 30,
					bottom: 30
				},
			},
			scales: {
				xAxes: [{
					time: {
						unit: 'date'
					},
					gridLines: {
						display: false,
						drawBorder: false
					},
					ticks: {
						maxTicksLimit: 10
					}
				}],
				yAxes: [{
					ticks: {
						maxTicksLimit: 5,
						padding: 10,
						callback: function(value, index, values) {
							return simbol + new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(value);
						}
					},
					gridLines: {
						color: "rgb(234, 236, 244)",
						zeroLineColor: "rgb(234, 236, 244)",
						drawBorder: false,
						borderDash: [2],
						zeroLineBorderDash: [2]
					},
				}],
			},
			legend: {
				display: false
			},
			tooltips: {
				backgroundColor: "rgb(255,255,255)",
				bodyFontColor: "#858796",
				titleMarginBottom: 10,
				titleFontColor: '#6e707e',
				titleFontSize: 16,
				borderColor: '#dddfeb',
				borderWidth: 1,
				xPadding: 15,
				yPadding: 15,
				displayColors: false,
				intersect: false,
				mode: 'index',
				caretPadding: 10,
				callbacks: {
                label: function(tooltipItem, chart) {
                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                    return datasetLabel + ': ' + simbol + new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3 }).format(tooltipItem.yLabel);
                }
            }
			}
		}
	});
}
