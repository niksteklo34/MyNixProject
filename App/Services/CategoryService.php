<?php

namespace App\Services;

use Core\DB;
use PDO;

class CategoryService
{
    public PDO $DbConnect;

    public function __construct(PDO $PDO)
    {
        $this->DbConnect = $PDO;
    }

    public static function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function getAll()
    {
        $sql = "SELECT id, category 
                FROM categories";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function geById(int $id)
    {
        $sql = "SELECT id, category
                FROM categories
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function create(string $categories) : bool
    {
        $sql = "INSERT INTO categories(category)
                VALUE (:categories);";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['categories' => $categories]);
        return true;
    }

    public function update(int $id, string $category) : bool
    {
        $sql = "UPDATE categories
                SET category = :category
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'id' => $id,
            'category' => $category
        ]);
        return true;
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM categories
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }
}