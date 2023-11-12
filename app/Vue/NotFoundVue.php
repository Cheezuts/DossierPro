<?php

namespace app\Vue;

class NotFoundVue extends RenderGlobalVue
{
    public function render($message)
    {
        $content = '
            <div class="row justify-content-center">                
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
            <h5 class="card-title">404</h5>
            <h6 class="card-subtitle mb-2 text-muted">Page not found</h6>
            <p class="card-text alert alert-danger">' . $message . '</p>
            <a href="index.php" class="card-link">Retour à l\'accueil</a>
            </div>
            </div>
            </div>
            ';

        $this->print($content);
    }
}
