<?php

namespace Controllers;

use App\Models\Product;
use App\Tools\renderClass;

class ProductController
{

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

        $products = $productObject->getAll();

        $obj = new renderClass();

        $obj->render($template, $layout, $products);
    }

}
