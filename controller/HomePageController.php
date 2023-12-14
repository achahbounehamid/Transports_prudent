<?php
session_start();

class HomePageController extends Controller
{
  
    public function home()
    { 
         global $router;
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['id'])) {
            // L'utilisateur n'est pas connecté, rediriger vers une page de connexion
            header('Location: ' . $router->generate('loginForm'));
            exit();
        }

        // Si l'utilisateur est connecté, afficher la page d'accueil
        echo self::render('HomePage.html.twig', []);
    }

}



   


