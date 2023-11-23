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
                name: 'Femmes',
                
            }
        ],
        title: 'le taux d\absenteisme '
    }, '#genderDistributionChartContainer');

//graphique pour afficher Satisfaction par métier

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

//gtraphique qui affiche afficher le nom et le prénom des employés regroupés par métier

let resultNomPrenomParMetier = dataSatisfaction.map(item => {
    return { x: item.titreDemploi, y: item.NomCompletMétier };
});

let colonnesCylindrique = new ej.charts.Chart({
    primaryXAxis: {
        valueType: 'Category',
        title: 'Métier'
    },
    primaryYAxis: {
        minimum: 0, maximum: 80,
        interval: 10, title: 'Nom d\emploiyes'
    },
    series: [{
        dataSource: resultNomPrenomParMetier,
        xName: 'x',
        yName: 'y',
        tooltipMappingName: 'y',
        type: 'Column',
        columnFacet: 'Cylinder'
    }],
    title: 'Nom et prénom par métier'
}, '#absenteeismChartContainer');

// console.log(resultNomPrenomParMetier);




//  graphique fichier Emploiyes



// Remplir les données pour les séries et les catégories
let dataResultFichierEmploiyes=resultFichierEmploiyes.forEach(function (item) {
    categories.push(item.departement);
    seriesData.push({
        name: item.titreDemploi,
        value: 1, // Vous pouvez ajuster cela en fonction de vos données
    });
});

// Configurer le graphique Syncfusion
let resultFichierEmploiyes = new ej.charts.Chart({
    // Configurer les propriétés du graphique
    // ...
    series: [
        {
            type: 'StackingColumn',
            dataSource: resultFichierEmploiyes,
            xName: 'name',
            yName: 'value'
        }
    ],
    primaryXAxis: {
        valueType: 'Category',
        labels: categories
    },
    // ...
}, '#FichierEmploiyes');
console.log(resultFichierEmploiyes);


// let resultFichierEmploiyes = new ej.charts.AccumulationChart({
//     width: '500px',
//     height: '300px',
//     series: [
//         {
//             dataSource: resultFichierEmploiyes,
//             dataLabel: { visible: true, name: 'text', position: 'Outside'  },
//             startAngle: 270,
//             endAngle: 90,
//             xName: 'x',
//             yName: 'y'
//         }
//     ],
   
// },);
