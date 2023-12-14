<?php

class CommerceModel extends Model
{
       // Méthode pour récupérer les 10 meilleurs clients par département pour les années 2022 et 2023
       public function getTopClientcADepartement()
       {
           // Préparation de la requête SQL en utilisant la connexion à la base de données obtenue de la classe parente (Model)
           $req = $this->getDb()->prepare('SELECT 
                       CodeDepartement,
                       chiffre_affaires FROM vw_ca_par_departement 
                       WHERE annee = 2023 OR annee = 2022 ORDER BY 
                       chiffre_affaires DESC LIMIT 10');
   
           // Exécution de la requête préparée
           $req->execute();
   
           // Récupération de toutes les lignes résultantes sous forme de tableau associatif
           $data = $req->fetchAll(PDO::FETCH_ASSOC);
   
           // Retourne le tableau associatif contenant les résultats de la requête
           return $data;
       }


    public function getChiffreAffairesParMois()
    {
        $req = $this->getDb()->prepare('
            SELECT
                YEAR(`DateFact`) AS `annee`,
                MONTH(`DateFact`) AS `mois`,
                SUM(`Montant`) AS `chiffre_affaires`
            FROM
                `chiffre_affaires`
            WHERE
                YEAR(`DateFact`) IN (2022, 2023)
            GROUP BY
                YEAR(`DateFact`), MONTH(`DateFact`)
            ORDER BY 
                YEAR(`DateFact`), MONTH(`DateFact`)
        ');
        $req->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $data = $req->fetchAll(PDO::FETCH_ASSOC);

        // Convertir le numéro du mois en nom complet en français
        $moisEnFrancais = [
            1 => 'Janvier',
            2 => 'Février',
            3 => 'Mars',
            4 => 'Avril',
            5 => 'Mai',
            6 => 'Juin',
            7 => 'Juillet',
            8 => 'Août',
            9 => 'Septembre',
            10 => 'Octobre',
            11 => 'Novembre',
            12 => 'Décembre'
        ];

        foreach ($data as $item) {
            $item['mois'] = $moisEnFrancais[$item['mois']];
        }
        return $data;
    }
} 

