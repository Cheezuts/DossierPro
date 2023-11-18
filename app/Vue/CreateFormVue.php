<?php

namespace app\Vue;

use app\App;


class CreateFormVue  extends RenderGlobalVue
{
    public function render($message = '')
    {
        $content = '
            <div class="container">
                <h1 class="mt-5">Ajouter un nouvel article</h1>
                <div id="alertMessage">' . $message . '</div>
                <form method="post" action="?action=create" id="createArticleForm">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenu" class="form-label">Contenu</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="submit" id="submitBtn" class="btn btn-primary">Ajouter</button>
                </form>
            </div>';

        $this->print($content);
    }
}
