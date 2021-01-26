<?php

namespace classes;

use classes\logger\LoggerInterface;

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
            // функции с массивами
            if ($id == $product['id']){
                return $product;
            }
        }
        $this->logger->warning('Id not found', ['id' => $id]);
        throw new NonIdException('FFF');
    }
}
