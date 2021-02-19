<?php

namespace Controllers;

use Core\Session\Session;
use Core\Tools\renderClass;

class MainController
{
    private Session $session;

    public function __construct(array $route)
    {
        $this->session = Session::getInstance();
    }

    public function Index() {
        $template = 'mainTemplate';
        $layout = 'main';

        $session = $this->session;

        $obj = new renderClass();

        $obj->render($template, $layout, ['session' => $session]);
    }

}
