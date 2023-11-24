<?php

class CommerceModel extends Model
{
    public function getTopClientcADepartement()
    {
        $req = $this->getDb()->prepare('SELECT CodeDepartement, SUM(total_chiffre_affaires) AS total_chiffre_affaires
        FROM vw_ca_par_departement
        GROUP BY CodeDepartement
        ORDER BY CodeDepartement
        LIMIT 10;
        ');
        $req->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
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

    foreach ($data as &$item) {
        $item['mois'] = $moisEnFrancais[$item['mois']];
    }
        return $data;
    }
    
}
