<?php

namespace Controllers;

use Core\Session\Authentication;
use Core\Tools\renderClass;
use App\Models\Product;

class CatalogController
{
    public Product $productModel;
    private Authentication $authSession;
    private renderClass $renderClass;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->authSession = new Authentication();
        $this->renderClass = new renderClass();
    }

    public function Index() {
        $template = 'catalogTemplate';
        $layout = 'catalog';

        $products = $this->productModel->productMapper();
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
                    $product = $this->productModel->getProductsWithCategoriesById($_POST['AddWish']);
                    $_SESSION['wish_list'][] = $product;
                }
                header('Location: ../catalog');
            }
        }
    }

}
