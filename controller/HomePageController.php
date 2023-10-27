
<?php

require_once 'controller.php';

class HomePageController extends Controller
{
    public function home()
     {
      
        echo self::render('HomePage.html.twig', []);
}
}
