
<?php
require_once 'Controller.php';

class HomePageController extends Controller
{
    public function home()
    {
        $this->render('HomePage.html.twig', []);
    }
}

