<?php

require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';

$router = new AltoRouter();

$router->setBasePath('/Transports_prudent');


// Définition des routes
$router->map('GET', '/', 'HomePageController#home','home');
$router->map('GET', '/graphiqueCommerce', 'CommerceController#commerce', 'commerce'); // Nouvelle route pour le graphique

$match = $router->match();
// var_dump($match);

if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    require 'controller/' . $controller . '.php';
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    // Gérer les routes inexistantes
    echo 'Page non trouvée';
}
