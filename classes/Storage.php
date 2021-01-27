<?php

namespace classes;

use classes\logger\LoggerInterface;
use classes\exceptions\NonIdException;

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
