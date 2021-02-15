<?php


namespace App\models;
use PDO;

class User
{

    public $db_connect;

    public function __construct()
    {
        $db_connect = DB::getInstance();
        $this->db_connect = $db_connect->connect();
    }

    public function createUser($name, $surname, $email, $password)
    {
        $connect = $this->db_connect;
        $query = "INSERT INTO user(name, surname, email, password) VALUES ('{$name}','{$surname}','{$email}','{$password}')";
        $resultQuery = $connect->prepare($query);
        $resultQuery->execute();
        if ($resultQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUser($email)
    {
        $connect = $this->db_connect;
        $query = "SELECT * FROM user WHERE email = '{$email}'";
        $resultQuery = $connect->prepare($query);
        $resultQuery->execute();
        return $userInfo = $resultQuery->fetch(PDO::FETCH_OBJ);
    }

    public function fegAllOrdersForUser($personId)
    {
        $connect = $this->db_connect;
        $query = "select user.name,surname, products.title,price,date from user join users_orders on users_orders.user_id = user.id join products on products.id = users_orders.product_id WHERE user.id = '{$personId}';";
        $resultQuery = $connect->prepare($query);
        $resultQuery->execute();
        return $userOrders = $resultQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function makeOrder(int $user, int $product)
    {
        $connect = $this->db_connect;
        $query = "INSERT INTO users_orders(user_id,product_id,date) VALUES ({$user}, {$product}, NOW())";
        $prepareQuery = $connect->prepare($query);
        $prepareQuery->execute();
        if ($prepareQuery) {
            return true;
        } else {
            return false;
        }
    }
}