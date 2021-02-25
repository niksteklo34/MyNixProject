<?php

namespace Controllers;

use App\Models\User;
use App\models\WishList;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class UserController
{

    private renderClass $renderClass;
    private Authentication $authSession;
    private WishList $wishListModel;
    private User $baseUser;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->baseUser = new User();
        $this->authSession = new Authentication();
        $this->wishListModel = new WishList();
    }

    public function index() {
        $template = 'userTemplate';
        $layout = 'user';

        $session = $this->authSession->session;

        $baseUser = $this->baseUser;

        $this->renderClass->render($template, $layout, ['baseUser' => $baseUser, 'session' => $session]);

    }

    public function wish() {
        $template = 'wishTemplate';
        $layout = 'user';

        $session = $this->authSession->session;
        $userId = $this->authSession->session->get('id');
        $wishList = $this->wishListModel->getWishForUser($userId);
        $countWish = $this->wishListModel->countForUser($userId);

        $this->renderClass->render($template, $layout, ['session' => $session, 'wishList' => $wishList, 'countWish' => $countWish]);
    }

    public function removeWish()
    {
        if (!empty($_POST)) {
            if (isset($_POST['deleteProduct'])) {
                $delProduct = $_POST['deleteProduct'];
                $this->wishListModel->deleteWish($delProduct);
                header('Location: ../user/wish');
            }
        }
    }

    public function shopList()
    {
        $template = 'shopListTemplate';
        $layout = 'user';

        $session = $this->authSession->session;

        $this->renderClass->render($template, $layout, ['session' => $session /*'orders' => $orders*/]);
    }

    public function shopListApi()
    {
        if (isset($_SESSION['name'])) {
            $orders = $this->baseUser->getAllOrdersForUser($this->authSession->session->get('id'));
        }

        $ordersArray = [];
        foreach ($orders as $value) {
            $order = [];
            $order['name'] = $value->name;
            $order['surname'] = $value->surname;
            $order['email'] = $value->email;
            $order['qty'] = $value->qty;
            $order['title'] = $value->title;
            $order['price'] = $value->price;
            array_push($ordersArray, $order);
        }

        $jsonProductsStr = json_encode($ordersArray, JSON_UNESCAPED_UNICODE);

        echo $jsonProductsStr;
    }

    public function logout()
    {
        if (!empty($_POST)) {
            if (isset($_POST['logout'])) {
                setcookie("PHPSESSID", 'false', time() - 1);
                $this->authSession->session->destroy();
                header("Location: ../../main");
            }
        }
    }

}