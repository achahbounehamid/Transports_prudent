<?php

require_once './model/CommerceModel.php';


class CommerceController extends Controller
{
    public function commerce()
    {
        // Initialiser le modèle CommerceModel
        $commerceModel = new CommerceModel();
        // Appel à la méthode du modèle pour obtenir les données
        //  du chiffre d'affaires des 10 premiers clients
        $topClientsData = $commerceModel->getTopClientcADepartement();
        $cvParMoisDatas = $commerceModel->getChiffreAffairesParMois();
        // Passer les données au template Twig
        $twig = $this->getTwig();
        echo $twig->render('Commerce.html.twig', [
        'topClientsData' => $topClientsData, 
        'chiffreAffairesParMoisData' => $cvParMoisDatas
        ]);
    }
    
} 
