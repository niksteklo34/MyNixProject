<?php

namespace App\Services;

use Core\DB;
use PDO;

class SortService
{

    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function toBottomPrice()
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.price DESC";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function toHighPrice()
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.price";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function titleSortFromA()
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.title";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function titleSortFromZ()
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.title DESC";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

}