<?php

class renderClass
{
    public function render( $template,  $layout, array $products)
    {
        $layouts = "/../pages/layouts/";
        $templates = "/../pages/templates/";

        // Подключение header
        ob_start();
        require_once __DIR__ . $layouts . "limbs/header.php";
        $header = ob_get_clean();

        // Подключение content
        ob_start();
        require_once __DIR__ . $templates . $template .".php";
        $content = ob_get_clean();

        // Подключение footer
        ob_start();
        require_once __DIR__ . $layouts . "/limbs/footer.php";
        $footer = ob_get_clean();

        // Подключение шаблона страницы
        require_once __DIR__ . $layouts . $layout . ".php";
    }
}
