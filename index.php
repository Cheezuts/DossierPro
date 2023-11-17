<?php

use app\Controller\Controller;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Autoloader.php';
Autoloader::register();

require_once 'app/config/App.php'; // Ajout de cette ligne


$controller = new Controller();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
            // creation d'une voiture
            //case 'create':
            //    $controller->createCar();
            //    break;
        default:
            $controller->notFound('La page n\'existe pas <br><span class="fw-bold fs-1"> erreur 404 </span>');
            break;
    }
} else {
    $controller->home();
}
