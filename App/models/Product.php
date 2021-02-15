<?php

namespace App\Models;

use App\models\BaseModel;
use PDO;

class Product extends BaseModel
{
    public $db_connect;
    public $id;
    public $name;
    public $img;
    public $description;
    public $price;
    public $status;

    public function __construct()
    {
        $db_connect = DB::getInstance();
        $this->db_connect = $db_connect->connect();
    }

    public function getProductsDb()
    {
        $connect = $this->db_connect;
        $query = "SELECT * FROM products";
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
