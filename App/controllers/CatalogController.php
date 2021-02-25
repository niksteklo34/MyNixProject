<?php

namespace Controllers;

use App\models\WishList;
use App\Services\ProductService;
use App\Services\SortService;
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
    private SortService $sortService;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->authSession = new Authentication();
        $this->renderClass = new renderClass();
        $this->wishListModel = new WishList();
        $this->productService = new ProductService();
        $this->sortService = new SortService();
    }

    public function Index() {
        $template = 'catalogTemplate';
        $layout = 'catalog';

        $products = $this->productService->getProductsWithCategories();
        if (!empty($_POST)) {
            switch ($_POST['sort']) {
                case 'highPrice':
                    $products = $this->sortService->toBottomPrice();
                    break;
                case 'lowPrice':
                    $products = $this->sortService->toHighPrice();
                    break;
                case 'a-z':
                    $products = $this->sortService->titleSortFromA();
                    break;
                case 'z-a':
                    $products = $this->sortService->titleSortFromZ();
                    break;
            }
        }

        $products = $this->productModel->productMapper($products);
        $session = $this->authSession->session;

        $this->renderClass->render($template, $layout, ['products' => $products, 'session' => $session]);
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
