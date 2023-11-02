<?php
require_once './class/Model.php';

class CommerceModel extends Model
{
    public function getTopClientcADepartement()
    {
        $req = $this->getDb()->prepare('SELECT ca.idClient, SUM(ca.Montant) AS chiffre_affaires, ca.CodeDepartement, ca.Nom_DEPT
                FROM chiffre_affaires ca
                GROUP BY ca.idClient, ca.CodeDepartement, ca.Nom_DEPT
                ORDER BY chiffre_affaires DESC
                LIMIT 10');
    
        $req->execute();
        
        // Récupérer les résultats sous forme de tableau associatif
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
