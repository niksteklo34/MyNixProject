<?php


namespace App\models;


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
        $resultQuery = $connect->query($query);
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
        $resultQuery = $connect->query($query);
        $products = array();
        while ($product = $resultQuery->fetch_object()) {
            $products[] = $product;
        }
        return $products;
    }

    public function fegAllOrdersForUser($personName)
    {
        $connect = $this->db_connect;
        $query = "select user.name,surname, products.title,price,date from user join coffezin.users_orders on coffezin.users_orders.user_id = coffezin.user.id join coffezin.products on coffezin.products.id = coffezin.users_orders.product_id WHERE user.name = '{$personName}'";
        $resultQuery = $connect->query($query);
        $products = array();
        while ($product = $resultQuery->fetch_object()) {
            $products[] = $product;
        }
        return $products;
    }
}