<?php

namespace app\Controller;

use app\Vue\HomeVue;
use app\Vue\NotFoundVue;

class Controller
{
    public function home()
    {
        // on rend la vue qui va afficher la page d'accueil
        $vue = new HomeVue();
        $vue->render();
    }

    public function notFound($message)
    {
        // on rend la vue qui va afficher la page 404
        $vue = new NotFoundVue();
        $vue->render($message);
    }

    // creation formCar
    //public function formCar()
    //{
    //    // on rend la vue qui va afficher la page 404
    //    $vue = new FormCarVue(); + faire la vue FormCarVue
    //    $vue->render($message);
    //}

    // public function createCar()
}
