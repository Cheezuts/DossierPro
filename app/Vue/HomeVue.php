<?php

namespace app\Vue;


class HomeVue extends RenderGlobalVue
{
    public function render()
    {
        $content = '
            <h1>Accueil</h1>
            <p>Bienvenue sur le site de location de voitures</p>
            <a href="?action=list" class="btn btn-primary">Voir la liste des voitures</a>
            ';


        $this->print($content);
    }
}
