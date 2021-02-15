<?php


namespace Controllers;

use App\models\User;
use App\Session\Authentication;
use App\Tools\renderClass;

class AuthController
{
    public renderClass $renderClass;
    public Authentication $auth;
    public User $baseUser;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->auth = new Authentication();
        $this->baseUser = new User();
    }

    public function login() {
        if (!isset($_SESSION['name'])) {
            $template = 'loginTemplate';
        } else {
            $template = 'loginedTemplate';
        }
        $layout = 'login';

        $Auth = $this->auth;

        $this->renderClass->render($template, $layout, ['Auth' => $Auth]);
    }

    public function logout() {
        $this->authentication->logOut();
    }

    public function reg() {
        $template = 'registerTemplate';
        $layout = 'register';

        $baseUser = $this->baseUser;

        $this->renderClass->render($template, $layout, ['baseUser' => $baseUser]);
    }

    public function user() {
        $template = 'userTemplate';
        $layout = 'user';

        $baseUser = $this->baseUser;

        $this->renderClass->render($template, $layout, ['baseUser' => $baseUser]);
    }

}
