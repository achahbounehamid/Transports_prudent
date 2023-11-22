
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

//graphique 


// let piechart = new ej.charts.AccumulationChart({
//     series: [{
//         dataSource: piechart,
       
//         dataLabel: {
//             visible: true,
//             position: 'Outside',
//             name: 'x'
//         },
//         radius: 'r',
//         xName: 'Metier', // Assurez-vous que cela correspond à votre structure de données
//         yName: 'Hommes', // Assurez-vous que cela correspond à votre structure de données
//         innerRadius: '20%'
//     }],
//     enableSmartLabels: true,
//     legendSettings: {
//         visible: true,
//     },
//     enableAnimation: true,
//     title: 'Répartition Hommes/Femmes par Métier'
    
// },'#absenteeismChartContainer');

//graphique Pyramide
// Données de la série pour le graphique Pyramide
let pyramidChartData = dataFichierEmploiyes.map(item => {
    return { x: item.x, y: item.y, text: item.text }; // Assurez-vous que cela correspond à votre structure de données
});

// Configuration du graphique Pyramide
let pyramidChart = new ej.charts.AccumulationChart({
    width: '600px',
    series: [{
        type: 'Pyramid',
        dataSource: pyramidChartData,
        xName: 'Nom',
         yName: 'TitreDemploi',
        dataLabel: { name: 'text', visible: true, position: 'Inside' },
    }],
    title: '',
}, '#FichierEmploiyes');
