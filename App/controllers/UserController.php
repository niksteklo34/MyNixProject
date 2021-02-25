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

        if (isset($_SESSION['name'])) {
            $orders = $this->baseUser->getAllOrdersForUser($this->authSession->session->get('id'));
        }

        $session = $this->authSession->session;

        $this->renderClass->render($template, $layout, ['session' => $session, 'orders' => $orders]);
    }

    public function logout()
    {
        if (!empty($_POST)) {
            if (isset($_POST['logout'])) {
                echo "<br><h3>До свидания, {$this->authSession->session->get('name')}<br>Вы выйдете через 3 секунды...</h3>";
                $this->authSession->session->destroy();
                header("Location: ../../main");
            }
        }
    }

}