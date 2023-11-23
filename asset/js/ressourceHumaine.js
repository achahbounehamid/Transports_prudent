
//graphique pour afficher le taux d'absenteisme par Metier
    let genderDistributionChart = new ej.charts.Chart({
        primaryXAxis: {
            title: 'Metier',
            valueType: 'Category',
           
        },
        primaryYAxis: {
            valueType: 'Category',
            title: 'Taux Absenteisme Moyen',
            labelFormat: '{value}%'
        },
        series: [
            {
                type: 'Column',
                dataSource: data,
                xName: 'Metier',
                yName: 'TauxAbsenteismeMoyen',
                name: 'Hommes'
            },
            {
                type: 'Column',
                dataSource: data,
                xName: 'Metier',
                yName: 'Metier',
                name: 'Femmes'
            }
        ],
        title: 'Répartition Homme-Femme par Métier'
    }, '#genderDistributionChartContainer');

//graphique pour afficher Satisfaction par mities

// Transformez les données en un format compatible avec le graphique d'histogramme
let satisfactionChart= dataSatisfaction.map(item => {
    return { x: item.Metier, y: parseFloat(item.SatisfactionMoyenne) }; // Convertissez la chaîne en nombre
});
console.log(satisfactionChart);
// Créez le graphique d'histogramme
let chart = new ej.charts.Chart({
    // Configuration du graphique d'histogramme
    primaryXAxis: {
        title: 'Métier',
    },
    primaryYAxis: {
        title: 'Satisfaction Moyenne',
    },
    series: [
        {
            type: 'Histogram', 
            dataSource: satisfactionChart,
            xName: 'x',
            yName: 'y',
            columnWidth: 0.99
        }
    ],
},'#satisfactionChartContainer');


  
