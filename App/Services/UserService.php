<?php


namespace App\Services;


use PDO;
use Core\DB;

class UserService
{

    public function connect(): PDO
    {
        return DB::getInstance()->connect();
    }

    public function getAll()
    {
        $sql = "SELECT id, name, surname, email
                FROM user";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getById(int $id)
    {
        $sql = "SELECT id, name, surname, email
                FROM user
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function getByName(string $name)
    {
        $sql = "SELECT id, name, surname, email, password 
                FROM user
                WHERE name = :name";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['name' => $name]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getByEmail(string $email)
    {
        $sql = "SELECT id, name, surname, email, password 
                FROM user
                WHERE email = :email";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['email' => $email]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function create(string $name, string $surname, string $email, string $password): bool
    {
        $sql = "INSERT INTO user (name, surname, email, password) 
                VALUE (:name, :surname, :email, :password)";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['name' => $name,  'surname' => $surname, 'email' => $email, 'password' => $password,]);
        return true;
    }

    public function update(int $id, string $name, string $surname, string $email, string $password): bool
    {
        $sql = "UPDATE user
                SET (  name = :name, 
                       city = :city,
                       email = :email, 
                       password = :password) 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id, 'name' => $name, 'surname' => $surname, 'email' => $email, 'password' => $password]);
        return true;
    }

    public function getAllOrdersForUser($order_id, $user_id)
    {
        $sql = 'select user.name,surname,email , orders.created_at, orders.id, order_products.qty , products.title , products.price
                from order_products join orders on order_products.order_id = orders.id
                join user on user.id = orders.user_id
                join products on products.id = order_products.product_id
                where order_products.order_id = :order_id and user.id = :user_id';

        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'user_id' => $user_id,
            'order_id' => $order_id,
        ]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM user
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }

}