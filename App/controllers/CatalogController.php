<?php

namespace Controllers;

use App\models\WishList;
use App\Services\ProductService;
use App\Models\Sort;
use Core\Pagination;
use Core\Session\Authentication;
use Core\Tools\renderClass;
use App\Models\Product;

class CatalogController
{
    private Product $productModel;
    private Authentication $authSession;
    private renderClass $renderClass;
    private WishList $wishListModel;
    private ProductService $productService;
    private Sort $sortModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->authSession = new Authentication();
        $this->renderClass = new renderClass();
        $this->wishListModel = new WishList();
        $this->productService = new ProductService();
        $this->sortModel = new Sort();
    }

    public function Index() {
        $template = 'catalogTemplate';
        $layout = 'catalog';

        $total = $this->productService->count();
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $perpage = 2;

        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();

        $products = $this->productService->pagination($start,$perpage);

        $session = $this->authSession->session;

        $this->renderClass->render($template, $layout, ['pagination' => $pagination, 'products' => $products/*'products' => $products*/, 'session' => $session]);
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
