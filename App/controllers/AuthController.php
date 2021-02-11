<?php


namespace Controllers;

use App\Session\Authentication;
use App\Tools\renderClass;

class AuthController
{
    public renderClass $renderClass;
    public Authentication $authentication;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->authentication = new Authentication();
    }

    public function login() {
        if (!isset($_SESSION['name'])) {
            $template = 'loginTemplate';
        } else {
            $template = 'loginedTemplate';
        }
        $layout = 'login';

        $this->renderClass->render($template, $layout, []);
    }

    public function logout() {
        $this->authentication->logOut();
    }

    public function reg() {
        $template = 'registerTemplate';
        $layout = 'register';

        $this->renderClass->render($template, $layout, []);
    }

    public function user() {
        $template = 'userTemplate';
        $layout = 'user';

        $session = $this->authentication;

        $this->renderClass->render($template, $layout, $session);
    }

}
