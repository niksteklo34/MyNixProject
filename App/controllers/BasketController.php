<?php

namespace Controllers;

use App\models\User;
use Core\Session\Session;
use Core\Tools\renderClass;

class BasketController
{
    public Session $session;
    public User $userModel;
    public $products;

    public function __construct()
    {
        $this->session = Session::getInstance();
        if (isset($_SESSION['cart_list'])) {
            $this->products = $_SESSION['cart_list'];
        }
        $this->userModel = new User();
    }

    public function Index() {
        $template = 'basketTemplate';
        $layout = 'basket';

        if (isset($_SESSION['cart_list'])) {
            $products = $this->products;
        } else {
            $products = [];
        }

        $session = $this->session;

        $obj = new renderClass();

        $obj->render($template, $layout, ['products' => $products, 'session' => $session]);
    }

    public function remove()
    {
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                $this->session->delete('cart_list',"$delProduct");
                header('Location: ../basket');
            }
            if (isset($_POST['delAll'])) {
                $this->session->set('cart_list', []);
                header('Location: ../basket');
            }
        }
    }

    public function makeOrder()
    {
        if (!empty($_POST)) {
            if (isset($_POST['takeOrder'])) {
                foreach ($this->products as $value) {
                    $this->userModel->makeOrder($this->session->get('id'), $value->id);
                }
                $this->session->set('cart_list', []);
                echo "<h1 style='text-align: center'>Ваш заказ создан, вернуться на <a style='text-align: center' href='../main'>домашнюю страницу</a>!</h1>";
            }
        }
    }
}
