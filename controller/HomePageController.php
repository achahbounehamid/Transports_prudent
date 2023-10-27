
<?php

class HomePageController
{
    public function home()
    {
        // Créer un environnement Twig
        $loader = new \Twig\Loader\FilesystemLoader('./view/');
        $twig = new \Twig\Environment($loader);

        // Rendre la vue HomePage.html.twig
        $template = $twig->load('HomePage.html.twig');
        $content = $template->render();

        // Afficher le contenu de la vue
        echo $content;
    }
}
