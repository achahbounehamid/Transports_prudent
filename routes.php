<?php

require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';


use  AltoRouter;

$router = new AltoRouter();

$router->setBasePath('/projet_Stage/Transport_prudent');

// Définition des routes
$router->map('GET', '/', 'HomePageController#home','home');



// Correspondance des routes
$match = $router->match();


// Exécution de la route correspondante
if ($match) {
    list($controller, $action) = explode('#', $match['target']);
    require 'controllers/' . $controller . '.php';
    $controllerInstance = new $controller();
    $controllerInstance->$action();
} else {
    // Gérer les routes inexistantes
    echo 'Page non trouvée';
}

