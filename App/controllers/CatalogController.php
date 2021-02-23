<?php

namespace Controllers;

use App\Models\BaseModel;
use App\Services\ProductService;
use Core\Session\Session;
use Core\Tools\renderClass;
use App\Models\Product;

class CatalogController
{
    public ProductService $productService;
    private Session $session;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->session = Session::getInstance();
    }

    public function Index() {
        $template = 'catalogTemplate';
        $layout = 'catalog';

        $productObject = new Product();

        $products = $productObject->productMapper();

        $obj = new renderClass();

        $obj->render($template, $layout, ['products' => $products, 'session' => $this->session]);
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            if (isset($_POST['AddCart'])) {
                if ($this->session->sessionExists() && $this->session->keyExists('name')) {
                    $product = $this->productService->getProductsWithCategoriesById($_POST['AddCart']);
                    $_SESSION['cart_list'][] = $product;
                }
                header('Location: ../catalog');
            }
            if (isset($_POST['AddWish'])) {
                if ($this->session->sessionExists() && $this->session->keyExists('name')) {
                    $product = $this->productService->getProductsWithCategoriesById($_POST['AddWish']);
                    $_SESSION['wish_list'][] = $product;
                }
                header('Location: ../catalog');
            }
        }
    }

}
