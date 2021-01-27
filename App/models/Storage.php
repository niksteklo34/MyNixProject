<?php

namespace App\models;

use App\tools\logger\LoggerInterface;
use App\exceptions\NonIdException;

class Storage
{
    private array $products = [];
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(array $products,LoggerInterface $logger)
    {
        $this->products = $products;
        $this->logger = $logger;
    }

    public function getProductDataById(int $id) : array
    {
        foreach ($this->products as $product) {
            if ($id == $product['id']){
                return $product;
            }
        }
        $this->logger->warning('Id not found', ['id' => $id]);
        throw new NonIdException('Id not found');
    }
}
