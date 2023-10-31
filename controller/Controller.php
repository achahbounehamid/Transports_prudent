<?php
abstract class Controller
{
    private static $loader;
    private static $twig;
   
   

    private static function setLoader()
    {
        self::$loader = new \Twig\Loader\FilesystemLoader('./view');
    }

    private static function setTwig()
    {
        self::$twig = new \Twig\Environment(self::getLoader(), [
            'cache' => false
        ]);
        // self::$twig->addGlobal('session', $_SESSION);
    }

    protected static function getLoader()
    {
        if (self::$loader == null) {
            self::setLoader();
        }
        return self::$loader;
    }

    protected static function getTwig()
    {
        if (self::$twig == null) {
            self::setTwig();

            self::$twig->addFunction(new \Twig\TwigFunction('path', function ($routeName) {
                global $router;
                return $router->generate($routeName);
                }));
                // Add the asset function to Twig environment
            self::$twig->addFunction(new \Twig\TwigFunction('asset', function ($assetPath) {
                // Modify this logic according to your asset setup
                $basePath = '/Transports_prudent'; // Update with your base asset path
                return $basePath . $assetPath;
            }));
        }
        return self::$twig;
    }
    protected function render($template, $data)
    {
        $twig = $this->getTwig(); // Utilisez la méthode getTwig de la classe mère
        $template = $twig->load($template);
        $content = $template->render($data);
        echo $content;
    }
}

