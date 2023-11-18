<?php

namespace app\Vue;

class AdminDashboard extends RenderGlobalVue
{
    public function render($message)
    {
        $content = '
        <div class="container">
        <h1 class="mt-5">Bienvenu sur l\'administration</h1>

        <div id="alertMessage">' . $message . '</div>

        ';


        $this->print($content);
    }
}
