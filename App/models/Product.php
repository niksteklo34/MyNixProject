<?php


namespace App\models;


class Product
{
    public $id;
    public $name;
    public $img;
    public $description;
    public $price;
    public $status;


    public function getAll()
    {
        $DB = 'products.txt';
        $productsFromDB = file_get_contents($DB, true);
        $products = explode('==========', $productsFromDB);
        $productData = [];
        foreach ($products as $product) {
            $productProperties = explode(';;;', $product);

            $object = new Product();
            $object->id = $productProperties[0];
            $object->name = $productProperties[1];
            $object->img = $productProperties[2];
            $object->description = $productProperties[3];
            $object->price = $productProperties[4];
            $object->status = $productProperties[4];

            array_push($productData, $object);
        }
        return $productData;
    }
}
