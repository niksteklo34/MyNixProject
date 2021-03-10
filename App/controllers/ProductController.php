<?php

namespace Controllers;

use App\models\Comment;
use App\Models\Product;
use Core\Session\Authentication;
use Core\Tools\renderClass;

class ProductController
{
    private Authentication $authSession;
    private renderClass $renderClass;
    private Product $productModel;
    private Comment $comment;

    public function __construct()
    {
        $this->renderClass = new renderClass();
        $this->authSession = new Authentication();
        $this->productModel = new Product();
        $this->comment = new Comment();
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
        $layout = 'default';

        $products = $this->productModel->productMapper();

        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $uri = explode('/', $uri);

        $session = $this->authSession->session;
        $product = ProductController::checkProduct($products, $uri);
        $comments = $this->comment->getAllCommentsForProduct($product->id);

        $this->renderClass->render($template, $layout, compact('product', 'session', 'comments'));
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

    public function addComment()
    {
        if (!empty($_POST)) {
            if (!empty($_POST['submitComment'])) {
                $productId = $_POST['submitComment'];
                $comment = trim($_POST['comment'], ' ');
                if ($this->authSession->session->sessionExists() && $this->authSession->session->keyExists('name')) {
                    if (!empty($comment)) {
                        $this->comment->createComment($this->authSession->session->get('id'), $productId, $comment);
                    }
                }
            }
            header("Location: ../{$productId}");
        }
    }

}
