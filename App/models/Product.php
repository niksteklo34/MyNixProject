<?php

namespace App\Models;

use PDO;
use Core\DB;

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
        return $this->baseModel->get('products','*');
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
