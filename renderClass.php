<?php

class renderClass
{
    public function render( $template,  $layout, array $products)
    {
        // Подключение header
        ob_start();
        require_once __DIR__ . "/pages/layouts/limbs/header.php";
        $header = ob_get_clean();

        // Подключение content
        ob_start();
        require_once __DIR__ . "/pages/templates/" . $template .".php";
        $content = ob_get_clean();

        // Подключение footer
        ob_start();
        require_once __DIR__ . "/pages/layouts/limbs/footer.php";
        $footer = ob_get_clean();

        // Подключение шаблона страницы
        require_once __DIR__ . "/pages/layouts/" . $layout . ".php";
    }
}
