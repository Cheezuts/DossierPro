<?php

use app\Vue\CreateFormVue;

$createFormVue = new CreateFormVue();

// Appel de la méthode createArticle du contrôleur
$message = $controller->createArticle();

// Affiche le formulaire
$createFormVue->render($message);
