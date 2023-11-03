<?php



class RessourceHumaineController extends Controller
{

  
    public function resourceHumaine()
{
    // Initialiser le modèle RessourceHumaineModel
    $ressourceHumaineModel = new RessourceHumaineModel();

    $data = $ressourceHumaineModel->getResourceHumaine();

    // Passer les données au template Twig
    $twig = $this->getTwig();

    echo $twig->render('RessourceHumaines.html.twig', $data);
}

}