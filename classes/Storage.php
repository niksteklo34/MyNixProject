<?php


class Storage
{
    private $products = [];

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProductDataById(int $id) : array
    {
        foreach ($this->products as $product) {
            if ($id == $product['id']){
                return $product;
            }
        } return [];
    }
}
