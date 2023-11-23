document.addEventListener('DOMContentLoaded', function () {
   
    //console.log('Data from controller:', topClientsData);

    let chartDataPie = dataPie.map(function (item) {
        return {
            x: item.Nom_DEPT,
            y: item.CodeDepartement
        };
    });

    let pieChart = new ej.charts.AccumulationChart({
        series: [
            {
                type: 'Pie',
                dataSource: chartDataPie,
                xName: 'x',
                yName: 'y',
                //explode: true,
                //explodeOffset: '10%',
                dataLabel: {
                    visible: true,
                    position: 'Outside',
                    name: 'text'
                }
            }
        ],
        tooltip: {
        enable: true,
         format: '${point.x}: ${point.y}'
    }
    });

    pieChart.appendTo('#chartContainer');

    // Graphique en spline


    let chartDataSpline2022 = [];
    let chartDataSpline2023 = [];

    // Séparer les données pour les années 2022 et 2023
    dataSpline.forEach(function (item) {
        if (item.annee === 2022) {
            chartDataSpline2022.push({
                x: item.mois,
                y: item.chiffre_affaires,
            });
        } else if (item.annee === 2023) {
            chartDataSpline2023.push({
                x: item.mois,
                y: item.chiffre_affaires,
            });
        }
    });

    let splineChart = new ej.charts.Chart({
        primaryXAxis: {
            title: 'Mois',
            valueType: 'Category'
            
        },
        primaryYAxis: {
            title: 'Chiffre d\'affaires',
            labelFormat: '${value}M'
        },
        series: [
            {
                type: 'Line',
                dataSource: chartDataSpline2022,
                xName: 'x',
                yName: 'y',
                marker: {
                    visible: true,
                    width: 10,
                    height: 10
                },
                width: 4,
                fill: 'red'
            },
            {
                type: 'Line',
                dataSource: chartDataSpline2023,
                xName: 'x',
                yName: 'y',
                marker: {
                    visible: true,
                    width: 10,
                    height: 10
                },
                width: 4,
                fill: 'green'
            }
        ]
    });

    splineChart.appendTo('#CaParMois');
});