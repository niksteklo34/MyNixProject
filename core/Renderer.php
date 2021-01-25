<?php

class Renderer
{
    public function render($template, $layout, array $products)
    {
        $templates = __DIR__ . "/../view/templates/";

        ob_start();
        require_once $templates . $template . ".php";
        $content = ob_get_clean();
        require_once $templates . $layout . ".php";
    }
}
