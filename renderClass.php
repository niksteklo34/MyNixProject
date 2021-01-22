<?php

class renderClass
{
    public function render( $template,  $layout, array $data)
    {
        ob_start();
        require_once __DIR__ . "/templates/" . $template .".php";
        $content = ob_get_clean();

        require_once __DIR__ . "/templates/" . $layout . ".php";
    }
}