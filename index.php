<?php

session_start();

use app\Controller\Controller;
use app\Controller\AdminController;


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'Autoloader.php';
Autoloader::register();

require_once 'app/config/App.php'; // Ajout de cette ligne


// Démarrez la session si elle n'est pas déjà active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifiez si la clé 'admin_email' existe dans la session
if (isset($_SESSION['admin_email'])) {
    echo 'Connecté en tant qu\'administrateur : ' . $_SESSION['admin_email'];
    // Vous pouvez également ajouter un lien de déconnexion ici si nécessaire
    echo '<br><a href="?action=logout">Déconnexion</a>';
} else {
    echo 'Non connecté en tant qu\'administrateur.';
}


$controller = new Controller();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {

        case 'create':
            require_once 'app/Vue/create.php';
            break;

        case 'createArticle':
            $controller->createArticle();
            break;

        case 'admin':
            $adminController = new AdminController();
            $adminController->loginAdmin();
            break;

        case 'adminPage':
            $adminController = new AdminController();
            $adminController->adminPage();
            break;

        case 'logout':
            $adminController = new AdminController();
            $adminController->logout();
            break;

        default:
            $controller->notFound('La page n\'existe pas <br><span class="fw-bold fs-1"> erreur 404 </span>');
            break;
    }
} else {
    $controller->home();
}
