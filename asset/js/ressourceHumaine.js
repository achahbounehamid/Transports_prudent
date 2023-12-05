
let tauxAbsence = new ej.charts.Chart({
    primaryXAxis: {
        valueType: 'Category',
        interval: 1, // Afficher chaque mois
        labelIntersectAction: 'Rotate45', // Rotation des étiquettes pour une meilleure visibilité
    },
    primaryYAxis: {
        // Ajustez la valeur maximale en conséquence
       
        labelFormat: '{value}%', // Format des étiquettes de l'axe des y en pourcentage
    },
    series: [{
        dataSource: dataTauxAbsence,
        xName: 'libelle',
        yName: 'taux_moyen_arrondi',
        name: '2022',
        type: 'Column'
    },
    {
        dataSource: dataTauxAbsence,
        xName: 'libelle',
        yName: 'taux_moyen_arrondi',
        name: '2023',
        columnWidth: 0.8,
        columnSpacing: 1.5,
        type: 'Column',
    }],
    title: 'Taux d\absentéisme',

}, '.chart-placeholder');

let masseSalaire = new ej.charts.Chart({
    primaryXAxis: {
        valueType: 'Category',
        interval: 1, // Afficher chaque mois
        labelIntersectAction: 'Rotate45', // Rotation des étiquettes pour une meilleure visibilité
    },
    primaryYAxis: {
        // Ajustez la valeur maximale en conséquence
        // interval: 5, 
        labelFormat: '{value}', // Format des étiquettes de l'axe des y en pourcentage
    },
    series: [{
        dataSource: dataMasseSalaire,
        xName: 'libelle',
        yName: 'moyenne_mensuelle',
        name: '2022',
        type: 'Column',
        fill: '#24ECE3',
    },
    {
        dataSource: dataMasseSalaire,
        xName: 'libelle',
        yName: 'moyenne_mensuelle',
        name: '2023',
        columnWidth: 0.8,
        columnSpacing: 1.5,
        type: 'Column',
        fill: '#2196F3',
    }],
    title: 'Evolution de la masse salariale'
}, '#absenteeismChartContainer');