function draw_doughnut_graph(labels, data, id) {
    var element = document.getElementById(id);
    var chart = new Chart(element, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#4e73df', '#1cc88a', '#e74a3b'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#8b2015'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: options = {
            maintainAspectRatio: true,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true
            },
            cutoutPercentage: 80,
        },
    });
}