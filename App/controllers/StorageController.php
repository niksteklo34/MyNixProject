<?php


namespace Controllers;


use App\Models\Storage;
use App\Tools\Logger\Logger;

class StorageController
{

    public function getProductDataByIdOLD()
    {
        $products = require_once __DIR__ . '/../models/products.php';

        $logger = new Logger();

        // function for work with storage
        $storage = new Storage($products, $logger);

        $id = 2;

        $contentById = $storage->getProductDataById($id);

        $contentById['desc'];

        if (!$contentById) {
            throw new MyException('id not found');

        }
         var_dump($contentById);
    }

}