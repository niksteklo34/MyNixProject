<?php

namespace Controllers;

use App\models\Order;
use App\models\User;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class BasketController
{
    public Authentication $authSession;
    public User $userModel;
    public Order $orderModel;
    public renderClass $renderClass;
    public $products;

    public function __construct()
    {
        if (isset($_SESSION['cart_list'])) {
            $this->products = $_SESSION['cart_list'];
        }
        $this->userModel = new User();
        $this->orderModel = new Order();
        $this->authSession = new Authentication();
        $this->renderClass = new renderClass();
    }

    public function Index() {
        $template = 'basketTemplate';
        $layout = 'basket';

        $sessionCartList = $this->authSession->session->keyExists('cart_list');

        if ($sessionCartList) {
            $products = $this->products;
        } else {
            $products = [];
        }

        $session = $this->authSession->session;

        $this->renderClass->render($template, $layout, ['products' => $products, 'session' => $session]);
    }

    public function remove()
    {
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                $this->authSession->session->delete('cart_list',"$delProduct");
                header('Location: ../basket');
            }
            if (isset($_POST['delAll'])) {
                $this->authSession->session->set('cart_list', []);
                header('Location: ../basket');
            }
        }
    }


    // добавить количество
    public function makeOrder()
    {
        if (!empty($_POST)) {
            if (isset($_POST['takeOrder'])) {
                $this->userModel->makeOrder($this->authSession->session->get("id"), $this->authSession->session->get('fullPrice'));
                $lastOrderId = $this->orderModel->getLastId();
                foreach ($this->products as $value) {
                    $this->orderModel->createAllProductsByIdOrder($value->id, $lastOrderId, 131);
                }
                $this->authSession->session->set('cart_list', []);
                echo "<h1 style='text-align: center'>Ваш заказ создан, вернуться на <a style='text-align: center' href='../main'>домашнюю страницу</a>!</h1>";
            }
        }
    }
}
