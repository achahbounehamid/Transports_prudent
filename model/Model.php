
<?php
// Classe abstraite représentant un modèle de base pour la gestion de la base de données
abstract class Model {
    // Propriété privée statique qui stocke l'instance de connexion à la base de données
    private static $db;
    // Méthode privée statique pour établir la connexion à la base de données
    private static function setDb(){
        try {
            // Création d'une instance PDO pour la connexion à la base de données MySQL
            self::$db = new PDO('mysql:host=localhost;dbname=transports_prudent;charset=utf8', 'root');
        } catch(PDOException $e){
            // En cas d'erreur lors de la connexion, affichage du message d'erreur
            echo "Erreur :" . $e->getMessage();
        }
    }
    // Méthode protégée pour obtenir l'instance de la connexion à la base de données
    protected function getDb(){
        // Si l'instance de la connexion n'existe pas (null), appel de la méthode setDb pour créer la connexion
        if(self::$db == null){
            self::setDb();
        }
        // Retourne l'instance de la connexion à la base de données
        return self::$db;
    }
}
