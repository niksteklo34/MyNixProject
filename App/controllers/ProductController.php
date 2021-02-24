<?php

namespace Controllers;

use App\Models\Product;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class ProductController
{
    public Authentication $authSession;
    public renderClass $renderClass;
    public Product $productModel;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->authSession = new Authentication();
        $this->productModel = new Product();
    }

    public static function checkProduct($products, $uri){
        $productInfo = [];
        foreach ($products as $product) {
            if ($product->id == $uri['1']) {
                $productInfo = $product;
            }
        }
        return $productInfo;
    }

    public function Index() {
        $template = 'productTemplate';
        $layout = 'product';

        $products = $this->productModel->productMapper();

        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = explode('/', $uri);

        $session = $this->authSession->session;
        $product = ProductController::checkProduct($products, $uri);

        $this->renderClass->render($template, $layout, ['product' => $product, 'session' => $session]);
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            $id = $_POST['add'];
            $product = $this->productModel->getProduct($id);
            $_SESSION['cart_list'][] = $product;
            header("Location: ../{$product->id}");
        }
    }

}
