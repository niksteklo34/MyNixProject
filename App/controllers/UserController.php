<?php

namespace Controllers;

use App\Models\User;
use App\models\WishList;
use App\Services\OrderService;
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
        $layout = 'default';

        $session = $this->authSession->session;

        $baseUser = $this->baseUser;

        $this->renderClass->render($template, $layout, compact('baseUser', 'session'));

    }

    public function wish() {
        $template = 'wishTemplate';
        $layout = 'default';

        $session = $this->authSession->session;
        $userId = $this->authSession->session->get('id');
        $wishList = $this->wishListModel->getWishForUser($userId);
        $countWish = $this->wishListModel->countForUser($userId);

        $this->renderClass->render($template, $layout, compact('session', 'wishList', 'countWish'));
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
        $layout = 'default';

        $session = $this->authSession->session;

        $this->renderClass->render($template, $layout, compact('session'));
    }

    public function shopListApi()
    {
        $userOrders = [];
        $getAllOrders = (new OrderService())->getAll();
        foreach ($getAllOrders as $order) {
            array_push($userOrders, $this->baseUser->getAllOrdersForUser($order->id,$this->authSession->session->get('id')));
        }

        $jsonProductsStr = json_encode($userOrders, JSON_UNESCAPED_UNICODE);

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