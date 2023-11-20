<?php

require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();

$router->setBasePath('/Transports_prudent');

// Définition des routes
$router->map('GET', '/', 'HomePageController#home', 'home');
$router->map('GET', '/graphiqueCommerce', 'CommerceController#commerce', 'commerce'); // Nouvelle route pour le graphique
$router->map('GET', '/graphiqueRessourceHumaines', 'RessourceHumaineController#ressourceHumaines', 'ressourceHumaines');

// la route pour la page "Resource humaine"
$router->map('GET', '/graphiqueExploitation', 'ExploitationController#exploitation', 'exploitation'); // la route pour la page "Exploitation"

$match = $router->match();

if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    require_once 'controller/' . $controller . '.php';
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    // Gérer les routes inexistantes
    echo 'Page non trouvée';
}
