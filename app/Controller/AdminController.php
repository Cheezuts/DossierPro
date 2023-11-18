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
        // Vérifier si l'utilisateur est déjà authentifié
        if ($this->authenticator->isAdminAuthenticated()) {
            // Rediriger vers la page d'administration
            header('Location: ?action=adminPage');
            exit();
        }

        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Authentifier l'administrateur
            if ($this->authenticator->authenticateAdmin($email, $password)) {
                // L'authentification a réussi
                // Initialiser la session
                session_start();
                $_SESSION['admin_email'] = $email;
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
        // Vérifier si la session est active
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['admin_email'])) {
            // L'utilisateur est connecté
            $message = 'Connecté en tant qu\'administrateur : ' . $_SESSION['admin_email'];

            // Affichez le lien de déconnexion
            $message .= '<br><a href="?action=logout">Déconnexion</a>';

            $vue = new AdminDashboard();
            $vue->render($message);
        } else {
            // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
            header('Location: ?action=loginAdmin');
            exit();
        }
    }

    public function logout()
    {
        // Détruire la session et rediriger vers la page de connexion
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
