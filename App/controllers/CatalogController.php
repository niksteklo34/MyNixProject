<?php

namespace Controllers;

use App\Tools\renderClass;
use App\Models\Product;

class CatalogController
{
    public array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
    }

    public function Index() {
        // ДЗ
//        $o = new StorageController();
//        $o->getProductDataByIdOLD();

        $template = $this->route['controller'] . 'Template';
        $layout = $this->route['controller'];

        $productObject = new Product();

        $products = $productObject->getAll();

        $obj = new renderClass();

        $obj->render($template, $layout, $products);
    }

}
