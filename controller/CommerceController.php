<?php

require_once './controller/Controller.php';


class CommerceController extends Controller
{
    protected $commerceModel;

    public function __construct(CommerceModel $commerceModel)
    {
        parent::__construct(); // Appel du constructeur du contrôleur principal
        $this->commerceModel = $commerceModel;
    }

    public function commerce()
    {
        // Appel à la méthode du modèle pour obtenir les données du chiffre d'affaires des 10 premiers clients
        $topClientsData = $this->commerceModel->getTopClientcADepartement();

        // Passer les données au template Twig
        $twig = $this->getTwig();

        echo $twig->render('Commerce.html.twig', [
            'topClientsData' => $topClientsData,
        ]);
    }
}
