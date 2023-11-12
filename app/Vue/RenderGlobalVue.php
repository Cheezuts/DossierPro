<?php

namespace app\Vue;

abstract class RenderGlobalVue
{
    private function renderHeader()
    {
        include_once 'header.php';
    }

    private function renderNav()
    {
        include_once 'nav.php';
    }

    private function renderFooter()
    {
        include_once 'footer.php';
    }

    public function print($content)
    {
        $this->renderHeader();
        $this->renderNav();

        echo $content;

        $this->renderFooter();
    }
}
