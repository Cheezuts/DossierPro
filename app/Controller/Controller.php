<?php

namespace app\Controller;

use App\App;
use app\Vue\HomeVue;
use app\Vue\NotFoundVue;
use app\Vue\CreateFormVue;

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

    public function handleRequest()
    {
        $message = $this->createArticle();

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'create':
                    // Ne rien faire ici, la vue sera rendue dans le bloc else ci-dessous
                    break;
                    // autres cas...
            }
        } else {
            $vue = new HomeVue();
            $vue->render();
        }

        return $message; // Renvoyer le message
    }


    public function createArticle()
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Récupérez les données du formulaire
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];

            // Validation des champs obligatoires
            if (!empty($titre) && !empty($contenu)) {
                $db = App::getDb();
                $db->createArticle($titre, $contenu);

                // Message de succès
                $message = '<div class="alert alert-success" role="alert">
                L\'article a bien été ajouté !
                <a href="index.php">Retour à l\'accueil</a>
            </div>';
            } else {
                // Message d'avertissement si des champs sont manquants
                $message = '<div class="alert alert-warning" role="alert">
                Tous les champs doivent être remplis
            </div>';
            }
        }

        return $message;
    }
}
