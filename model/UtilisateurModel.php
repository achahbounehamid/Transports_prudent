<?php
require_once './class/Utilisateur.php';


class UtilisateurModel extends Model
{
    public function creeUtilisateur(utilisateur $utilisateur)
    {
         $nom = $utilisateur->getNom();
         $prenom = $utilisateur->getPrenom();
         $email = $utilisateur->getEmail();
         $motDePasse = $utilisateur->getMotDePasse();
        $req = $this->getDb()->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `email`, `motDePasse`) VALUES (:nom, :prenom, :email, :motDePasse)");
        $req->bindParam(":nom", $nom, PDO::PARAM_STR);
        $req->bindParam(":prenom", $prenom, PDO::PARAM_STR);
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->bindParam(":motDePasse", $motDePasse, PDO::PARAM_STR);
        $req->execute();    
    }


    
    public function getUtilisateurEmail(string $email)
    {
        $req = $this->getDb()->prepare("SELECT `id`, `email`, `motDePasse` FROM `utilisateur` WHERE `email` = :email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();

        return $req->rowCount() === 1 ? new Utilisateur($req->fetch(PDO::FETCH_ASSOC)) : false;
    }

    public function getUtilisateurId($Id)
    {
        $req = $this->getDb()->prepare('SELECT `id`, `nom`, `prenom`, `email`, `motDePasse` FROM `utilisateur` WHERE `id` = :id');
        $req->bindParam(':id', $Id, PDO::PARAM_INT);
        $req->execute();

        $utilisateurData = $req->fetch(PDO::FETCH_ASSOC);

        if (!$utilisateurData) {
            // Gérer le cas où aucun utilisateur n'est trouvé pour l'ID spécifié
            return null;
        }

        $utilisateur = new Utilisateur($utilisateurData);

        return $utilisateur;
    }

}