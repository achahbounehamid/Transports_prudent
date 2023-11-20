<?php



class RessourceHumaineController extends Controller
{

  
    public function ressourceHumaine()
{
    // Initialiser le modèle RessourceHumaineModel
    $ressourceHumaineModel = new RessourceHumaineModel();

    $data = $ressourceHumaineModel->getRessourceHumaine();

    // Passer les données au template Twig
    $twig = $this->getTwig();

    echo $twig->render('RessourceHumaines.html.twig', $data);

}

}