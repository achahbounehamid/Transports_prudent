document.addEventListener('DOMContentLoaded', function () {
    

// Vérifiez si data est un tableau
if (Array.isArray(data)) {
    // Créez un tableau de données dans le format approprié pour Syncfusion
    let dataSource = [];
    data.forEach(item => {
        dataSource.push({
            type: item.type,
            Metier: item.Metier,
        });
    });
    console.log(data);
    let genderDistributionChart = new ej.charts.Chart({
        series: [
            {
                type: 'Doughnut',
                dataSource: dataSource,
                xName: 'Metier',
                yName: 'Hommes',
                name: 'Hommes'
            },
            {
                type: 'Doughnut',
                dataSource: dataSource,
                xName: 'Metier',
                yName: 'Femmes',
                name: 'Femmes'
            }
        ],
        title: 'Répartition Homme-Femme par Métier'
    });
}
});

