<?php


namespace App\Services;


use Core\DB;
use PDO;

class ProductService
{

    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function getAll()
    {
        $sql = "SELECT id, title, img, description, price, status  
                FROM products";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getById(int $id)
    {
        $sql = "SELECT id, title, img, description, price, status  
                FROM products 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, 'App\models\Product');
        return $statement->fetch();
    }

    public function create(string $title, string $img, string $description, string $price, string $status): bool
    {
        $sql = "INSERT INTO products (title, img, description, price, status) 
                VALUES (:title, :img, :description, :price, :status)";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'title' => $title,
            'img' => $img,
            'description' => $description,
            'price' => $price,
            'status' => $status
        ]);
        return true;
    }

    public function update(int $id, string $title, string $img, string $description, string $price, string $status): bool
    {
        $sql = "UPDATE products 
                SET (   title = :title,
                        img = :img, 
                        description = :description,
                        price = :price,
                        status = :status) 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'id' => $id,
            'title' => $title,
            'img' => $img,
            'description' => $description,
            'price' => $price,
            'status' => $status
        ]);
        return true;
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM products 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }

}