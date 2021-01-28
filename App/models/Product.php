<?php


namespace App\models;


class Product
{
    public function getAll()
    {
        $DB = 'products.txt';
        $productsFromDB = file_get_contents($DB, true);
        $products = explode('==========', $productsFromDB);
        $productData = [];
        foreach ($products as $product) {
            $productProperties = explode(';;;', $product);
            $allValues = (object) [ 'id' => $productProperties[0], 'name' => $productProperties[1], 'img' => $productProperties[2], 'desc' => $productProperties[3], 'price' => $productProperties[4], 'status' => $productProperties[5]];
            array_push($productData, $allValues);
        }
        return $productData;
    }
}
