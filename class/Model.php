<?php
abstract class Model {
    // private static $db;

    // private static function setDb(){
    //     try {
    //         self::$db = new PDO('mysql:host=localhost;dbname=transpotrs_prudent;charset=utf8', 'root');
    //     } catch(PDOException $e){
    //         echo "Erreur :" . $e->getMessage();
    //     }
    // }

    // protected function getDb(){
    //     if(self::$db == null){
    //         self::setDb();
    //     }
    //     return self::$db;
    // }

    private static function setDb(){
        try {
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Activer le mode d'erreur exception
                PDO::ATTR_EMULATE_PREPARES => false, // Désactiver l'émulation des requêtes préparées
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupérer les résultats sous forme de tableau associatif par défaut
            );
    
            self::$db = new PDO('mysql:host=localhost;dbname=transpotrs_prudent;charset=utf8', 'root', '', $options);
        } catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
       
    }
}