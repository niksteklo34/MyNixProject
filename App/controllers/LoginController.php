<?php

namespace App\controllers;

use App\tools\renderClass;

class LoginController
{
    public array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
    }

    public function Index() {
        $template = $this->route['controller'] . 'Template';
        $layout = $this->route['controller'];

        $obj = new renderClass();

        $obj->render($template, $layout, []);
    }

}
