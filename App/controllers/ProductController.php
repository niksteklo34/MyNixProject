<?php

namespace Controllers;

use App\models\BaseModel;
use App\Models\Product;
use App\Tools\renderClass;

class ProductController
{

    public BaseModel $baseModel;

    public function __construct()
    {
        $this->baseModel = new BaseModel();
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

        $productObject = new Product();
        $products = $productObject->productMapper();

        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = explode('/', $uri);

        $product = ProductController::checkProduct($products, $uri);

        $obj = new renderClass();

        $obj->render($template, $layout, ['product' => $product]);
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            $product = $this->baseModel->getById('products',$_POST['add']);
            $_SESSION['cart_list'][] = $product;
            header("Location: ../{$product->id}");
        }
    }

}
