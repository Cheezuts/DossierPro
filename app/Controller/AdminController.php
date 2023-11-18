<?php

namespace app\Controller;

// app/Controller/AdminController.php

use app\Vue\LoginAdminVue;
use app\Auth\AdminAuthenticator;
use app\Model\AdminModel;
use app\Vue\AdminDashboard;


class AdminController
{
    private $authenticator;

    public function __construct()
    {
        $this->authenticator = new AdminAuthenticator();
    }

    public function loginAdmin()
    {
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Authentifier l'administrateur
            if ($this->authenticator->authenticateAdmin($email, $password)) {
                // L'authentification a réussi
                // Rediriger vers la page d'administration
                header('Location: ?action=adminPage');
                exit(); // Assurez-vous de terminer le script ici
            } else {
                // L'authentification a échoué
                // Afficher un message d'erreur
                $message = '<div class="alert alert-danger"> <strong>Erreur :</strong> L\'authentification a échoué. Veuillez vérifier vos informations d\'identification. </div>';
            }
        }

        // Afficher la vue du formulaire de connexion
        $vue = new LoginAdminVue();
        $vue->render($message);
    }

    public function adminPage()
    {
        $vue = new AdminDashboard();
        $vue->render('Contenu de la page d\'administration');
    }
}
