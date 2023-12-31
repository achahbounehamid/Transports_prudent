<?php

class CommerceModel extends Model
{
    public function getTopClientcADepartement()
    {
        $req = $this->getDb()->prepare('SELECT `CodeDepartement`, `chiffre_affaires` FROM `vw_ca_par_departement` WHERE `annee` = 2023 OR `annee` = 2022 ORDER BY `chiffre_affaires` DESC LIMIT 10');
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
                ORDER BY YEAR(`DateFact`), MONTH(`DateFact`)
        ');
        $req->execute();

        // Récupérer les résultats sous forme de tableau associatif
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        // Convertir le numéro du mois en nom complet
        foreach ($data as &$item) {
            $item['mois'] = date("F", mktime(0, 0, 0, $item['mois'], 1));
        }
        return $data;
    }
}
