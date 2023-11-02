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
               
            self::$twig->addFunction(new \Twig\TwigFunction('asset', function ($assetPath) {
                
                $basePath = '/Transports_prudent/asset/'; 
                return $basePath . $assetPath;
              
            }));
        }
        return self::$twig;
    }
    protected function render($template, $data)
    {
        $twig = $this->getTwig();
        $template = $twig->load($template);
        $content = $template->render($data);
        echo $content;
    }
}

