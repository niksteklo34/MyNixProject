<?php

namespace App\Models;

use App\Services\ProductService;

class Product extends BaseModel
{
    public $id;
    public $name;
    public $img;
    public $description;
    public $price;
    public $status;
    public $category;

    public ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function productMapper()
    {
        $products = $this->productService->getProductsWithCategories();
        $productData = [];
        foreach ($products as $product) {

            $object = new Product();
            $object->id = $product->id;
            $object->name = $product->title;
            $object->img = $product->img;
            $object->description = $product->description;
            $object->price = $product->price;
            $object->status = $product->status;
            $object->category = $product->category;

            array_push($productData, $object);
        }
        return $productData;
    }
}
