<?php

class RessourceHumaineModel extends Model
{
    public function getRessourceHumaine()
    {
        // Préparez la requête pour le taux d'absentéisme
        $queryAbsenteeism = "SELECT titreDemploi, sexe AS Metier, AVG(tauxDAbsenteisme) AS TauxAbsenteismeMoyen FROM resource_humaine GROUP BY titreDemploi";
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

        // Préparez la requête pour  afficher le nom et le prénom des employés regroupés par métier,
        $queryGenderDistribution = "SELECT titreDemploi, GROUP_CONCAT(Nom, ' ', Prénom) AS NomCompletParMétier FROM resource_humaine GROUP BY titreDemploi";
        $nomPrenomParMetier = $this->getDb()->prepare($queryGenderDistribution);

        // Exécutez la requête pour la répartition homme/femme
        $nomPrenomParMetier->execute();

        // Récupérez les résultats sous forme de tableau associatif
        $resultNomPrenomParMetier = $nomPrenomParMetier->fetchAll(PDO::FETCH_ASSOC);
        // Transformez les données pour qu'elles soient compatibles avec le graphique
        $formattedResult = [];
        foreach ($resultNomPrenomParMetier as $row) {
            $formattedResult[] = [
                'titreDemploi' => $row['titreDemploi'],
                'NomCompletMétier' => $row['NomCompletParMétier']
            ];
        }

        $queryFichierEmploiyes = "SELECT departement, titreDemploi
        FROM resource_humaine
        WHERE 1";
        $stmtFichierEmploiyes = $this->getDb()->prepare($queryFichierEmploiyes);
        $stmtFichierEmploiyes->execute();

        $resultFichierEmploiyes = $stmtFichierEmploiyes->fetchAll(PDO::FETCH_ASSOC);

        return [
            'resultAbsenteeism' => $resultAbsenteeism,
            'resultSatisfaction' => $resultSatisfaction,
            'resultNomPrenomParMetier' => $formattedResult,
            'resultFichierEmploiyes' => $resultFichierEmploiyes,
        ];
    }  
  

}
