<?php

namespace app\Vue;

class LoginAdminVue extends RenderGlobalVue
{
    public function render($message)
    {
        $content = '
        <div class="container">
        <h1 class="mt-5">Connexion Administrateur</h1>

        <div id="alertMessage" alert alert-success>' . $message . '</div>

        <!-- Formulaire de connexion -->
        <form method="post" action="" id="adminLoginForm">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
    
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
    
            <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>';


        $this->print($content);
    }
}
