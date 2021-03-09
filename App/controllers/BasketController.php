<?php

namespace Controllers;

use App\models\Order;
use App\models\User;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class BasketController
{
    private Authentication $authSession;
    private User $userModel;
    private Order $orderModel;
    private renderClass $renderClass;
    private $products;

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
        $sessionCartList = $this->authSession->session->keyExists('cart_list');

        if ($sessionCartList) {
            $products = $this->products;
        } else {
            $products = [];
        }

        $session = $this->authSession->session;

        $this->renderClass->render('basketTemplate', 'default', compact('products', 'session'));
    }

    public function remove()
    {
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                $oldPrice = $this->authSession->session->get('fullPrice');
                $product = $this->authSession->session->get('cart_list');
                $this->authSession->session->delete('cart_list',"$delProduct");
                $productPrice = $product[$delProduct];
                if (!empty($productPrice->price)) {
                    $productPrice = $productPrice->price;
                } else {
                    $productPrice = 0;
                }
                $newPrice = $oldPrice - $productPrice;
                $this->authSession->session->set('fullPrice', $newPrice);
                header('Location: ../basket');
            }
            if (isset($_POST['delAll'])) {
                $this->authSession->session->set('cart_list', []);
                $this->authSession->session->set('fullPrice', 0);
                header('Location: ../basket');
            }
        }
    }

    public function setQty()
    {
        if (!empty($_POST)) {
            if (isset($_POST['productNumber']) && isset($_POST['qty'])) {
                foreach ($_SESSION['cart_list'] as $key => $value) {
                    if ($key == $_POST['productNumber']) {
                        $value->qty = $_POST['qty'];
                    }
                }
            }
            header('Location: ../basket');
        }
    }

    public function makeOrder()
    {
        if (!empty($_POST)) {
            if (isset($_POST['takeOrder'])) {
                $products = $this->authSession->session->get('cart_list');
                $this->userModel->makeOrder($this->authSession->session->get("id"), $this->authSession->session->get('fullPrice'));
                $lastOrderId = $this->orderModel->getLastId();
                foreach ($products as $product) {
                    $this->orderModel->createAllProductsByIdOrder($product->id, $lastOrderId, $product->qty);
                }
                $this->authSession->session->set('cart_list', []);
                echo "<h1 style='text-align: center'>Ваш заказ создан, вернуться на <a style='text-align: center' href='../main'>домашнюю страницу</a>!</h1>";
            }
        }
    }
}
