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
        $statement->setFetchMode(PDO::FETCH_OBJ);
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

    public function getProductsWithCategories()
    {
        $sql = "SELECT products.id,title,img,description,price,status, categories.category
                FROM products, categories
                WHERE products.category_id = categories.id;";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getProductsWithCategoriesById($id)
    {
        $sql = "SELECT products.id,title,img,description,price,status,qty , categories.category
                FROM products, categories
                WHERE products.id = :id AND products.category_id = categories.id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function search(string $word)
    {
        $sql = "SELECT * FROM products 
                WHERE title LIKE '%$word%' 
                OR description LIKE '%$word%'";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

        public function count()
    {
        $sql = "SELECT COUNT(*) as count FROM products";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        $row = $statement->fetch();
        return $row->count;
    }

    public function pagination(int $start, int $perpage)
    {
        $sql = "SELECT products.id,title,img,description,price,status, categories.category
                FROM products, categories
                WHERE products.category_id = categories.id
                LIMIT $start, $perpage";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

}