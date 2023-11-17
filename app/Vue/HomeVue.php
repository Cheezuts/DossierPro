<?php

namespace app\Vue;

use app\App;


class HomeVue extends RenderGlobalVue
{
    public function render()
    {
        // Récupérer l'instance de la base de données
        $db = App::getDb();

        // Effectuer la requête à la base de données
        $articles = $db->getAllArticles();

        // Construire le contenu HTML avec les données de la base de données
        $content = '
    <div class="container">
        <h1 class="mt-5">Accueil</h1>
        <p>Bienvenue sur le site de location de voitures.</p>
        <a href="?action=list" class="btn btn-primary">Voir la liste des voitures</a>
        <div class="articles-list mt-4">
';

        // Ajouter le contenu de la table "articles" à la Vue
        foreach ($articles as $article) {
            $content .= '
        <div class="card mt-3">
            <div class="card-body">
                <h3 class="card-title">' . $article->titre . '</h3>
                <p class="card-text">' . $article->contenu . '</p>
                <p class="card-date">Date de publication : ' . $article->date . '</p>
            </div>
        </div>
    ';
        }

        $content .= '
        </div>
    </div>
';

        $this->print($content);
    }
}
