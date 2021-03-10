<?php


namespace App\Services;


use Core\DB;
use PDO;

class WishListService
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
        $sql = "SELECT id, user_id, product_id
                FROM wish_list";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getById(int $id)
    {
        $sql = "SELECT id, user_id, product_id
                FROM wish_list
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function getByUserId(int $user_id)
    {
        $sql = "SELECT id, user_id, product_id
                FROM wish_list
                WHERE user_id = :user_id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['user_id' => $user_id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getAllWishForUser(int $user_id)
    {
        $sql = "SELECT wish_list.id , user.name,surname,email , products.img,title,price,status , categories.category
                FROM wish_list
                join products on wish_list.product_id = products.id
                join user on user.id = wish_list.user_id
                join categories on categories.id = products.category_id
                WHERE user.id = :user_id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['user_id' => $user_id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function create(int $user_id, int $product_id) : bool
    {
        $sql = "INSERT INTO wish_list(user_id, product_id)
                VALUE (:user_id, :product_id);";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);
        return true;
    }

    public function update(int $id, int $user_id, int $product_id) :bool
    {
        $sql = "UPDATE wish_list 
                SET (user_id = :user_id, 
                     product_id = :product_id) 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'id' => $id,
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);
        return true;
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM wish_list 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }

}