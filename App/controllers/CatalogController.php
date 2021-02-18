<?php

namespace Controllers;

use App\models\BaseModel;
use App\Tools\renderClass;
use App\Models\Product;

class CatalogController
{
    public BaseModel $baseModel;

    public function __construct()
    {
        $this->baseModel = new BaseModel();
    }

    public function Index() {
        // ДЗ
//        $o = new StorageController();
//        $o->getProductDataByIdOLD();

        $template = 'catalogTemplate';
        $layout = 'catalog';

        $productObject = new Product();

        $products = $productObject->productMapper();

        $obj = new renderClass();

        $obj->render($template, $layout, ['products' => $products]);
    }

    public function addProduct()
    {
        if (!empty($_POST)) {
            $product = $this->baseModel->getById('products',$_POST['Product']);
            $_SESSION['cart_list'][] = $product;
            header('Location: ../catalog');
        }
    }

}
