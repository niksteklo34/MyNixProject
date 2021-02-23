<?php

namespace Controllers;

use App\Models\User;
use Core\Session\Authentication;
use Core\Session\Session;
use Core\Tools\renderClass;

class UserController
{

    public renderClass $renderClass;
    public Session $session;
    public User $baseUser;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->baseUser = new User();
        $this->session = Session::getInstance();
    }

    public function index() {
        $template = 'userTemplate';
        $layout = 'user';

        $session = $this->session;

        $baseUser = $this->baseUser;

        $this->renderClass->render($template, $layout, ['baseUser' => $baseUser, 'session' => $session]);

    }

    public function wish() {
        $template = 'wishTemplate';
        $layout = 'user';

        $this->renderClass->render($template, $layout, ['session' => $this->session]);
    }

    public function removeWish()
    {
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                $this->session->delete('wish_list',$delProduct);
                header('Location: ../user/wish');
            }
        }
    }

    public function shopList()
    {
        $template = 'shopListTemplate';
        $layout = 'user';

        if (isset($_SESSION['name'])) {
            $orders = $this->baseUser->getAllOrdersForUser($this->session->get('id'));
        }

        $this->renderClass->render($template, $layout, ['session' => $this->session, 'orders' => $orders]);
    }

    public function logout()
    {
        if (!empty($_POST)) {
            if (isset($_POST['logout'])) {
                echo "<br><h3>До свидания, {$this->session->get('name')}<br>Вы выйдете через 3 секунды...</h3>";
                $this->session->destroy();
                header("Location: ../../main");
            }
        }
    }

}