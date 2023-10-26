<?php
// index.php

require 'vendor/autoload.php'; 

use AltoRouter;


require 'routes.php';

$controller = new MainController($router);
$controller->handleRequest();
