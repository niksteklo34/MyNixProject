<?php

namespace Controllers;

use Core\Session\Authentication;
use Core\Tools\renderClass;

class MainController
{
    private Authentication $authSession;
    private renderClass $renderClass;

    public function __construct()
    {
        $this->authSession = new Authentication();
        $this->renderClass = new renderClass();
    }

    public function Index() {
        $template = 'mainTemplate';
        $layout = 'default';

        $session = $this->authSession->session;
        $this->renderClass->render($template, $layout, compact('session'));
    }

}
