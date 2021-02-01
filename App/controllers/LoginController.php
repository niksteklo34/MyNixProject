<?php

namespace App\controllers;

use App\tools\renderClass;
use App\session\Authentication;

class LoginController
{
    public Authentication $authentication;
    public array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->authentication = new Authentication();
    }

    public function Index() {
        $template = $this->route['controller'] . 'Template';
        $layout = $this->route['controller'];

        $obj = new renderClass();

        $obj->render($template, $layout, []);
    }

}
