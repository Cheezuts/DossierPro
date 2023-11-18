<?php

namespace app\Model;

use app\App;

class AdminModel
{
    private $id;
    private $username;
    private $email;
    private $password;

    // ... autres propriétés et méthodes

    public function authenticateAdmin($email, $password)
    {
        $db = App::getDb();
        $query = "SELECT * FROM admin_users WHERE email = :email";
        $params = array(':email' => $email);

        $result = $db->query($query, 'App\Model\AdminModel', true, $params);

        if ($result && password_verify($password, $result->getPasswordHash())) {
            // L'administrateur est authentifié
            return true;
        }

        // L'authentification a échoué
        return false;
    }

    // Ajoutez une méthode getPasswordHash pour récupérer le mot de passe haché
    public function getPasswordHash()
    {
        return $this->password;
    }
}
