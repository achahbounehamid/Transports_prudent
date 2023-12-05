<?php

class RessourceHumaineModel extends Model
{
    public function getRessourceHumaine()
    {

        // Préparez la requête pour le taux d'absenteisme
        $reqTauxAbsence = $this->getDb()->prepare('SELECT libelle, annee, ROUND((taux)*100, 0) AS taux_moyen_arrondi
        FROM taux_absence
        WHERE annee IN (2022, 2023)
        GROUP BY libelle, annee
        ');
        $reqTauxAbsence->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $resultMassSalariale = $reqTauxAbsence->fetchAll(PDO::FETCH_ASSOC);
        // return ['resultTauxAbsence'=>$resultMassSalariale];

        // Préparez la requête pour Evolution de la masse salaire
        $reqMasseSalaire = $this->getDb()->prepare('SELECT annee, libelle, ROUND(AVG(montant), 0) AS moyenne_mensuelle
        FROM masse_salariale
        GROUP BY annee, mois;
        ');
        $reqMasseSalaire->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $resultMasseSalaire = $reqMasseSalaire->fetchAll(PDO::FETCH_ASSOC);

        return ['resultTauxAbsence'=>$resultMassSalariale,'resultMasseSalaire'=>$resultMasseSalaire,
    ];


    }

}
