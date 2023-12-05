<?php

require_once './model/RessourceHumaineModel.php';

class RessourceHumaineController extends Controller
{
    public function ressourceHumaines()
    {
        // Initialiser le modèle RessourceHumaineModel
        $ressourceHumaineModel = new RessourceHumaineModel();

        // Récupérer les données du modèle
        $ressourceHumaineData = $ressourceHumaineModel->getRessourceHumaine();

        // Passer les données au template Twig
        $twig = $this->getTwig();

        echo $twig->render('RessourceHumaines.html.twig', ['dataRessourceHumaine' => $ressourceHumaineData]);
    }
}