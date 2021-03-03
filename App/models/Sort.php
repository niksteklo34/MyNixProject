<?php

namespace App\Models;

use Core\DB;
use PDO;

class Sort
{

    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function toBottomPrice(int $start, int $perpage)
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.price DESC
                LIMIT $start, $perpage";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function toHighPrice(int $start, int $perpage)
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.price
                LIMIT $start, $perpage";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function titleSortFromA(int $start, int $perpage)
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.title
                LIMIT $start, $perpage";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function titleSortFromZ(int $start, int $perpage)
    {
        $sql = "SELECT products.id,category_id,img,description,price,status,title,qty , categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                ORDER BY products.title DESC
                LIMIT $start, $perpage";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

}
