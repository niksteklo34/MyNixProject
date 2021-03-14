<?php

namespace Controllers;

use App\models\Order;
use App\models\ShopList;
use App\Models\User;
use App\models\WishList;
use App\Services\OrderService;
use Core\Pagination;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class UserController
{

    private renderClass $renderClass;
    private Authentication $authSession;
    private WishList $wishListModel;
    private ShopList $shopListModel;
    private User $baseUser;
    private OrderService $orderService;
    private Pagination $pagination;
    private $page;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->baseUser = new User();
        $this->authSession = new Authentication();
        $this->wishListModel = new WishList();
        $this->shopListModel = new ShopList();
        $this->orderService = new OrderService(OrderService::connect());
        $this->page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if($this->authSession->session->keyExists('name')) {
        $this->pagination = new Pagination($this->page, 2, $this->shopListModel->countForUser($this->authSession->session->get('id')));
        }
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
        $session = $this->authSession->session;

        $pagination = $this->pagination;

        $this->renderClass->render('shopListTemplate', 'default', compact('pagination', 'session'));
    }

    public function shopListApi()
    {
        $userId = $this->authSession->session->get('id');
        $userOrders = [];
        $getAllOrdersForUser = $this->orderService->getAllByUserId($userId, $this->pagination->getPageNumber(), 2);
        foreach ($getAllOrdersForUser as $order) {
            $userOrder = [];
            $productsOrder = [];
            $userOrder['id'] = $order->id;
            $userOrder['user_id'] = $order->user_id;
            $userOrder['total_price'] = $order->total_price;
            $userOrder['date'] = $order->created_at;
            $productsDb = $this->orderService->getProductsByOrder($order->id);
            foreach ($productsDb as $product) {
                $productOrder = [];
                $productOrder['title'] = $product->title;
                $productOrder['price'] = $product->price;
                $productOrder['qty'] = $product->qty;
                $productOrder['id'] = $product->id;
                $productOrder['total_price'] = $product->total_price;
                array_push($productsOrder, $productOrder);
            }
            $userOrder['products'] = $productsOrder;
            array_push($userOrders, $userOrder);
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