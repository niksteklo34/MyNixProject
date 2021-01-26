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

        // Подключение footer
        ob_start();
        require_once __DIR__ . $layouts . "/limbs/footer.php";
        $footer = ob_get_clean();

        try {

            // Подключение content
            if (file_exists(__DIR__ . $templates . $template . ".php")) {
                ob_start();
                require_once __DIR__ . $templates . $template . ".php";
                $content = ob_get_clean();
            } else {
                throw new TemplateRendererExceprion('Такого контента нет<br>');
            }
        } catch (TemplateRendererExceprion $errors) {
            echo $errors->getMessage();
        }

        try {

            // Подключение шаблона страницы
            if (file_exists(__DIR__ . $layouts . $layout . ".php")){
                require_once __DIR__ . $layouts . $layout . ".php";
            } else {
                throw new LayoutRendererExceprion('Такой страницы layout нет');
            }
        } catch (LayoutRendererExceprion $errors) {
            echo $errors->getMessage();
        }

    }
}
