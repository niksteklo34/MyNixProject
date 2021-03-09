<?php

namespace Controllers;

use App\Models\User;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class AuthController
{
    private renderClass $renderClass;
    private Authentication $authSession;
    private User $baseUser;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->authSession = new Authentication();
        $this->baseUser = new User();
    }

    public function login()
    {
        $sessionName = $this->authSession->session->keyExists('name');

        if (!$sessionName) {
            $template = 'loginTemplate';
        } else {
            $template = 'loginedTemplate';
        }
        $layout = 'default';

        $Auth = $this->authSession;

        $this->renderClass->render($template, $layout, compact('Auth'));
    }

    public function authorization()
    {
        if (!empty($_POST['name'])) {
            $name = trim($_POST['name'], ' ');
            $surname = trim($_POST['surname'], ' ');
            $email = trim($_POST['email'], ' ');
            $password = trim($_POST['password'], ' ');

            $this->authSession->setDataForReg($name, $surname, $email, $password);
            $auth = $this->authSession->auth();
            if ($auth) {
                $_SESSION['cart_list'] = [];
            }
            header("Location: ../login");
        }
    }

    public function register()
    {
        $template = 'registerTemplate';
        $layout = 'default';

        $this->renderClass->render($template, $layout, []);
    }

    public function checkAndCreateUser()
    {
        if (!empty($_POST['name'])) {
            $name = trim($_POST['name'], ' ');
            $surname = trim($_POST['surname'], ' ');
            $email = trim($_POST['email'], ' ');
            $password = trim($_POST['password'], ' ');

            $userExist = $this->baseUser->checkUserExist($email);
            if (!$userExist) {
                $this->baseUser->createUser($name, $surname, $email, $password);
                echo "<p style=\"text-align: center;margin-top: 10px;font-size: 20px;color: black\">Вы зарегистрировались, {$name}!<br>Теперь <a href=\"../login\">войдите</a></p>";
            } else {
                echo "<p style=\"text-align: center;margin-top: 10px;font-size: 20px;color: black\">Такой email уже существует! <a href=\"../login\">Попробуйте еще раз!</a></p>";
            }
        }

    }
}
