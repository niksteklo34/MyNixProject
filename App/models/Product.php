<?php

namespace App\Models;

use App\models\BaseModel;

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

    public function getFromDb()
    {
        $connect = $this->db_connect;
        $query = "SELECT * FROM products";
        $resultQuery = $connect->query($query);
        $products = array();
        while ($product = $resultQuery->fetch_object()) {
            $products[] = $product;
        }
        return $products;
    }

    // это мапер
    public function getAll()
    {
        $products = $this->getFromDb();
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

    public function makeOrder(int $user, int $product)
    {
        $connect = $this->db_connect;
        $query = "INSERT INTO users_orders(user_id,product_id,date) VALUES ({$user}, {$product}, NOW())";
        $resultQuery = $connect->query($query);
        if ($resultQuery) {
            return true;
        } else {
            return false;
        }
    }
}
