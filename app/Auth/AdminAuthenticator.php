<?php

namespace app\Auth;

use app\App;

class AdminAuthenticator
{
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
}
