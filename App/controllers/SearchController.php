<?php


namespace Controllers;


use App\Services\ProductService;
use Core\Tools\renderClass;

class SearchController
{
    public renderClass $renderClass;
    public ProductService $productService;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->productService = new ProductService();
    }

    public function Index()
    {
        $template = 'searchTemplate';
        $layout = 'default';

        if (!empty($_POST)) {
            $title = trim($_POST['title']);
            $products = $this->productService->search($title);
        }

        if (empty($products)) {
            $products = [];
        }

        $this->renderClass->render($template, $layout, compact('products'));
    }
}