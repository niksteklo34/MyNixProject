<?php

namespace Controllers;

use App\Models\User;
use Core\Session\Authentication;
use Core\Session\Session;
use Core\Tools\renderClass;

class AuthController
{
    public renderClass $renderClass;
    public Authentication $auth;
    public Session $session;
    public User $baseUser;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->auth = new Authentication();
        $this->baseUser = new User();
        $this->session = Session::getInstance();
    }

    public function login() {
        if (!isset($_SESSION['name'])) {
            $template = 'loginTemplate';
        } else {
            $template = 'loginedTemplate';
        }
        $layout = 'login';

        $this->renderClass->render($template, $layout, ['Auth' => $this->auth]);
    }

    public function authorization()
    {
        if (!empty($_POST['name'])) {
            $name = trim($_POST['name'], ' ');
            $surname = trim($_POST['surname'], ' ');
            $email = trim($_POST['email'], ' ');
            $password = trim($_POST['password'], ' ');

            $this->auth->setDataForReg($name, $surname, $email, $password);
            $auth = $this->auth->auth();
            if ($auth) {
                $_SESSION['cart_list'] = [];
                $_SESSION['wish_list'] = [];
            }
            header("Location: ../login");
        }
    }

    public function reg() {
        $template = 'registerTemplate';
        $layout = 'register';

        $this->renderClass->render($template, $layout, []);
    }

    public function registration()
    {
        if (!empty($_POST['name'])) {
            $name = trim($_POST['name'], ' ');
            $surname = trim($_POST['surname'], ' ');
            $email = trim($_POST['email'], ' ');
            $password = trim($_POST['password'], ' ');

            $userExist = $this->baseUser->userExist($email);
            if (empty($userExist)) {
                $this->baseUser->createUser($name, $surname, $email, $password);
                echo "<p style=\"text-align: center;margin-top: 10px;font-size: 20px;color: black\">Вы зарегистрировались, {$name}!<br>Теперь <a href=\"../login\">войдите</a></p>";
            } else {
                echo "<p style=\"text-align: center;margin-top: 10px;font-size: 20px;color: black\">Такой email уже существует! <a href=\"../login\">Попробуйте еще раз!</a></p>";
            }
        }

    }
}
