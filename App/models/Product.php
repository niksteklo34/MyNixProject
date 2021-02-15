<?php

namespace App\Models;

use PDO;

class Product extends BaseModel
{
    private $db_connect;

    public $id;
    public $name;
    public $img;
    public $description;
    public $price;
    public $status;

    public BaseModel $baseModel;

    public function __construct()
    {
        $this->db_connect = DB::getInstance()->connect();
        $this->baseModel = new BaseModel();
    }

    public function getProductsDb()
    {
        $connect = $this->db_connect;
        $query = $this->baseModel->get('*','products');
        $dbProduct = $connect->prepare($query);
        $dbProduct->execute();
        return $products = $dbProduct->fetchAll(PDO::FETCH_OBJ);
    }

    public function productMapper()
    {
        $products = $this->getProductsDb();
        $productData = [];
        foreach ($products as $product) {

            $object = new Product();
            $object->id = $product->id;
            $object->name = $product->title;
            $object->img = $product->img;
            $object->description = $product->description;
            $object->price = $product->price;
            $object->status = $product->status;

            array_push($productData, $object);
        }
        return $productData;
    }
}
