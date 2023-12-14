// Transformation des données pour le graphique circulaire (pie chart)
let chartDataPie = dataPie.map(function (item) {
    // Pour chaque élément dans dataPie, crée un nouvel objet avec les propriétés x et y
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
            xName: 'x',// Champ utilisé comme abscisse
            yName: 'y',// Champ utilisé comme ordonnée
            //explode: true,
            //explodeOffset: '10%',
            dataLabel: {
                visible: true, // Affiche les étiquettes de données sur le graphique
                position: 'Outside', // Position des étiquettes (à l'extérieur des tranches)
                name: 'text' // Champ utilisé pour le texte de l'étiquette
        }
    }
    ],
    title:'Chiffre d\affaire par département',
    tooltip: {
    enable: true,
    //  format: '${point.x}: ${point.y}'
}
},'#chartContainer');

// deuxieme graphique

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
        labelFormat: '{value}M€',
        
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
            fill: 'red',
            name:'2022',
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
            fill: 'green',
            name:'2023',
        }
    ],
    title:'Chiffre d\affaire par année',

},'#CaParMois');


