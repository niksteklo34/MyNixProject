<?php

namespace Controllers;

use App\models\WishList;
use Core\Pagination;
use Core\Session\Authentication;
use Core\Sorting;
use Core\Tools\renderClass;
use App\Models\Product;

class CatalogController
{
    private Product $productModel;
    private Authentication $authSession;
    private renderClass $renderClass;
    private WishList $wishListModel;
    public $page;
    public $sort;


    public function __construct()
    {
        $this->productModel = new Product();
        $this->authSession = new Authentication();
        $this->renderClass = new renderClass();
        $this->wishListModel = new WishList();
        $this->page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $this->sort = isset($_GET['sort']) ? $_GET['sort'] : 'price-ASC';
    }

    public function Index() {
        $session = $this->authSession->session;
        $this->renderClass->render('catalogTemplate', 'default', compact('session'));
    }

    public function catalogApi() {
        $total = $this->productModel->count();
        $page = $this->page;
        $perpage = 2;
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getPageNumber();

        $params = explode('-', $this->sort);

        if (isset($this->sort) && isset($start)) {
            $products = $this->productModel->paginationAndSort($params[1], $params[0], $start, $perpage);
        }

        $arrayProducts['length'] = (int) $total;

        $arrayProducts['products'] = [];
        foreach ($products as $product) {
            $localProduct = [];
            $localProduct['id'] = (int) $product->id;
            $localProduct['category_id'] = $product->category_id;
            $localProduct['img'] = $product->img;
            $localProduct['description'] = $product->description;
            $localProduct['price'] = (int) $product->price;
            $localProduct['status'] = boolval($product->status);
            $localProduct['title'] = $product->title;
            $localProduct['qty'] = (int) $product->qty;
            $localProduct['category'] = $product->category;
            array_push($arrayProducts['products'], $localProduct);
        }

        $jsonProducts = json_encode($arrayProducts, JSON_UNESCAPED_UNICODE);

        echo $jsonProducts;
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            if (isset($_POST['AddCart'])) {
                if ($this->authSession->session->sessionExists() && $this->authSession->session->keyExists('name')) {
                    $product = $this->productModel->getProductsWithCategoriesById($_POST['AddCart']);
                    $oldPrice = $this->authSession->session->get('fullPrice');
                    $_SESSION['cart_list'][] = $product;
                    $this->authSession->session->set('fullPrice', $product->price + $oldPrice);
                }
                header('Location: ../catalog');
            }
            if (isset($_POST['AddWish'])) {
                if ($this->authSession->session->sessionExists() && $this->authSession->session->keyExists('name')) {
                    $userId = $this->authSession->session->get('id');
                    $productId = ($this->productModel->getProduct($_POST['AddWish']))->id;
                    $this->wishListModel->createWish($userId, $productId);
                }
                header('Location: ../catalog');
            }
        }
    }

}
