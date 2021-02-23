<?php

namespace App\Services;

use Core\DB;
use PDO;

class OrderService
{
    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function getAll()
    {
        $sql = "SELECT user_id, user_name, user_email, address, total_price, contact_phone, comments  
                FROM orders";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getAllByUserId(int $user_id)
    {
        $sql = "SELECT user_id, user_name, user_email, address, total_price, contact_phone, comments 
                FROM orders 
                WHERE user_id = :user_id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['user_id' => $user_id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getById(int $id)
    {
        $sql = "SELECT user_id, user_name, user_email, address, total_price, contact_phone, comments 
                FROM orders 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function create(
        int $user_id,
        int $total_price,
        string $comments = null
    ): bool
    {
        $sql = "INSERT INTO orders (user_id, total_price, comments) 
                VALUE (:user_id, :total_price, :comments)";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'user_id' => $user_id,
            'total_price' => $total_price,
            'comments' => $comments,
        ]);
        return true;
    }

    public function update(
        int $id,
        int $user_id,
        string $address,
        int $total_price,
        string $contact_phone,
        string $comments
    ): bool
    {
        $sql = "UPDATE orders 
                SET (   user_id = :user_id
                        address = :address, 
                        total_price = :total_price,
                        contact_phone = :contact_phone
                        comments = :comments ) 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id,
            'user_id' => $user_id,
            'address' => $address,
            'price_total' => $total_price,
            'contact_phone' => $contact_phone,
            'comments' => $comments
        ]);
        return true;
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM orders 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }

    public function createAllProductsByIdOrder(int $product_id, int $order_id, int $quantity): bool
    {
        $sql = "INSERT INTO order_products (product_id, order_id, qty)
                VALUES (:product_id, :order_id, :qty)";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['product_id' => $product_id, 'order_id' => $order_id, 'qty' => $quantity]);
        return true;
    }

    public function getAllProductsByIdOrder(int $order_id): array
    {
        $sql = "SELECT products.id, products.title, products.price, orders_products.quantity
                FROM products, orders_products
                WHERE orders_products.order_id = :order_id and orders_products.product_id = products.id;";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['order_id' => $order_id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getLastId(): int
    {
        $sql = "SELECT id
                FROM orders 
                ORDER BY id DESC LIMIT 1";
        $statement = $this->connect()->query($sql);
        $id = $statement->fetchAll();
        return (int) $id[0]['id'];
    }
}