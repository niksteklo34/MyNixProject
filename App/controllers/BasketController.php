<?php

namespace Controllers;

use App\Session\Session;
use App\Tools\renderClass;

class BasketController
{
    public array $route;

    public function __construct(array $route)
    {
        $this->route = $route;
    }

    public function Index() {
        $template = $this->route['controller'] . 'Template';
        $layout = $this->route['controller'];


        // Сюда из базы продуктов
//        new Session();
//        var_dump($_SESSION);
        if (isset($_SESSION['cart_list'])) {
            $products = $_SESSION['cart_list'];
        } else {
            $products = [];
        }

        $obj = new renderClass();

        $obj->render($template, $layout, $products);
    }

}
