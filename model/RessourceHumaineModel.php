<?php

class RessourceHumaineModel extends Model
{
    public function getRessourceHumaine()
    {
        // Préparez la requête pour le taux d'absentéisme
        $queryAbsenteeism = "SELECT titreDemploi AS Metier, AVG(tauxDAbsenteisme) AS TauxAbsenteismeMoyen FROM resource_humaine GROUP BY titreDemploi";
        $stmtAbsenteeism = $this->getDb()->prepare($queryAbsenteeism);

        // Exécutez la requête pour le taux d'absentéisme
        $stmtAbsenteeism->execute();

        // Récupérez les résultats sous forme de tableau associatif
        $resultAbsenteeism = $stmtAbsenteeism->fetchAll(PDO::FETCH_ASSOC);

        // Préparez la requête pour la satisfaction
        $querySatisfaction = "SELECT titreDemploi AS Metier, AVG(satisfaction) AS SatisfactionMoyenne FROM resource_humaine GROUP BY titreDemploi";
        $stmtSatisfaction = $this->getDb()->prepare($querySatisfaction);

        // Exécutez la requête pour la satisfaction
        $stmtSatisfaction->execute();

        // Récupérez les résultats sous forme de tableau associatif
        $resultSatisfaction = $stmtSatisfaction->fetchAll(PDO::FETCH_ASSOC);

        // Préparez la requête pour la répartition homme/femme
        $queryGenderDistribution = "SELECT titreDemploi AS Metier, 
           SUM(CASE WHEN sexe = 'Homme' THEN 1 ELSE 0 END) AS Hommes,
           SUM(CASE WHEN sexe = 'Femme' THEN 1 ELSE 0 END) AS Femmes
        FROM resource_humaine GROUP BY titreDemploi";
        $stmtGenderDistribution = $this->getDb()->prepare($queryGenderDistribution);

        // Exécutez la requête pour la répartition homme/femme
        $stmtGenderDistribution->execute();

        // Récupérez les résultats sous forme de tableau associatif
        $resultGenderDistribution = $stmtGenderDistribution->fetchAll(PDO::FETCH_ASSOC);

        return [
            'resultAbsenteeism' => $resultAbsenteeism,
            'resultSatisfaction' => $resultSatisfaction,
            'resultGenderDistribution' => $resultGenderDistribution,
        ];
    }
}
