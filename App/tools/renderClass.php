<?php

namespace App\tools;

use App\exceptions\TemplateRendererException;
use App\exceptions\LayoutRendererException;

class renderClass
{
    public function render( $template,  $layout, array $products)
    {
        $layouts = "/../view/layouts/";
        $templates = "/../view/templates/";

        // include header
        ob_start();
        require_once __DIR__ . $layouts . "limbs/header.php";
        $header = ob_get_clean();

        // include footer
        ob_start();
        require_once __DIR__ . $layouts . "/limbs/footer.php";
        $footer = ob_get_clean();

        // include content
        if (!file_exists(__DIR__ . $templates . $template . ".php")) {
            throw new TemplateRendererException('Content not found');
        }
            ob_start();
            require_once __DIR__ . $templates . $template . ".php";
            $content = ob_get_clean();

        // include layout page
        if (!file_exists(__DIR__ . $layouts . $layout . ".php")) {
            throw new LayoutRendererException('Layout not found');
        }
            require_once __DIR__ . $layouts . $layout . ".php";
    }
}
