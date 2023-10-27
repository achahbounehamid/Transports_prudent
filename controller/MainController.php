

// class MainController
// {
//     private $router;

//     public function __construct($router)
//     {
//         $this->router = $router;
//     }

//     public function handleRequest()
//     {
//         // Correspondance des routes
//         $match = $this->router->match();

//         if ($match) {
//             list($controller, $action) = explode('#', $match['target']);
//             require 'controller/' . $controller . '.php';
//             $controllerInstance = new $controller();
//             $controllerInstance->$action();
//         } else {
//             echo 'Page non trouvée';
//         }
//     }
// }
