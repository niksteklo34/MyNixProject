<?php


namespace Controllers;

use App\session\Authentication;
use App\tools\renderClass;

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
        $template = 'loginTemplate';
        $layout = 'login';

//        $this->validateData($_SESSION);

        if ($this->authentication->isAuth()) {
            $template = 'loginedTemplate';
        }

        $this->renderClass->render($template, $layout, []);
    }


    public function validateData(array $array) {
        var_dump($array);
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