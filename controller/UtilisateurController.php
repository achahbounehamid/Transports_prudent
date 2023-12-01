<?php
require_once './model/UtilisateurModel.php';

class UtilisateurController extends Controller
{
    public function register()
    {
        global $router; // On importe la variable $router définie ailleurs dans le code (probablement pour la gestion des routes)

        $model= new UtilisateurModel(); // Instanciation du modèle utilisateur

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si la requête est de type POST, cela signifie qu'un formulaire a été soumis

            // Récupération des données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $motDePasse = $_POST['motDePasse'];

            // Hachage du mot de passe à l'aide de la fonction password_hash
            $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);

            // Validation et nettoyage de l'adresse e-mail à l'aide de filter_var
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

            // Création d'un nouvel objet utilisateur avec les données du formulaire
            $utilisateurs = new Utilisateur([
                'nom' => $nom,
                'prenom' => $prenom,
                'motDePasse' => $motDePasse,
                'email' => $email,
            ]);
           

            $model->creeUtilisateur($utilisateurs);

            // Redirection vers la page d'inscription après avoir créé l'utilisateur
            header('Location: ' . $router->generate('register'));
        } else {
            // Si la requête n'est pas de type POST, afficher le formulaire d'inscription
            echo self::render('register.html.twig', []);
        }
    }

    public function login()
    {
        if (!$_POST) {
            echo self::render('register.html.twig', []);
        } else {
            $email = $_POST['email'];
            $motDePasse = $_POST['motDePasse'];

            $model = new UtilisateurModel();
            $utilisateur = $model->getUtilisateurEmail($email);

            if ($utilisateur) {
                if (password_verify($motDePasse, $utilisateur->getMotDePasse())) {
                    $_SESSION['id'] = $utilisateur->getId();
                    $_SESSION['email'] = $utilisateur->getEmail();
                    $_SESSION['connect'] = true;
                    $_SESSION['nom'] = $utilisateur->getNom();
                    global $router;
                    header('Location: ' . $router->generate('home'));
                    exit();
                } else {
                    $message = "Email / mot de passe incorrect!";
                    echo self::render('register.html.twig', ['message' => $message]);
                }
            } else {
                $message = "Email / mot de passe incorrect!";
                echo self::render('register.html.twig', ['message' => $message]);
            }
        }
    }

    public function logout()
    {
        session_destroy();

        global $router;
        header('Location: ' . $router->generate('home'));
        exit();
    }
}