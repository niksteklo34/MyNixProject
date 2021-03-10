<?php

namespace App\Models;

use App\Services\ProductService;

class Product
{
    public $id;
    public $title;
    public $img;
    public $qty;
    public $description;
    public $price;
    public $status;
    public $category;

    public ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService(ProductService::connect());
    }

    public function count()
    {
        return $this->productService->count();
    }

    public function creatProduct($title, $img_link, $description, $price, $status)
    {
        return $this->productService->create($title, $img_link, $description, $price, $status);
    }

    public function getProduct(int $id)
    {
        return $this->productService->getById($id);
    }

    public function update($id, $title, $img, $description, $price, $status)
    {
        return $this->productService->update($id, $title, $img, $description, $price, $status);
    }

    public function delete($product_id)
    {
        return $this->productService->delete($product_id);
    }

    public function productMapper($products = null)
    {
        if ($products === null) {
            $products = $this->productService->getProductsWithCategories();
        }
        $productData = [];
        foreach ($products as $product) {

            $object = new Product();
            $object->id = $product->id;
            $object->title = $product->title;
            $object->img = $product->img;
            $object->description = $product->description;
            $object->price = $product->price;
            $object->status = $product->status;
            $object->category = $product->category;

            array_push($productData, $object);
        }
        return $productData;
    }

    public function getProductsWithCategoriesById(int $id)
    {
        return $this->productService->getProductsWithCategoriesById($id);
    }

    public function paginationAndSort($desc, $sortRow, $start, $perpage)
    {
        return $this->productService->paginationAndSort($desc, $sortRow, $start, $perpage);
    }
}
