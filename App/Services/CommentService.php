<?php


namespace App\Services;

use PDO;
use Core\DB;

class CommentService
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
        $sql = "SELECT id, product_id, text
                FROM comments";
        $statement = $this->connect()->query($sql);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getById(int $id)
    {
        $sql = "SELECT id, product_id, text 
                FROM comments
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetch();
    }

    public function getAllCommentsForProduct($product_id)
    {
        $sql = "SELECT comments.id, product_id, text, comments.created_at , user.name, surname
                FROM comments
                join user on comments.user_id = user.id
                WHERE product_id = :product_id
                ORDER BY created_at DESC";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['product_id' => $product_id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function getAllCommentsByUser($user_id)
    {

        $sql = "SELECT comments.id, product_id, text, comments.created_at , user.name, surname
                FROM comments
                join user on comments.user_id = user.id
                WHERE user_id = :user_id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['user_id' => $user_id]);
        $statement->setFetchMode(PDO::FETCH_OBJ);
        return $statement->fetchAll();
    }

    public function create(int $user_id, int $product_id, string $comment) : bool
    {
        $sql = "INSERT INTO comments(user_id, product_id, text)
                VALUE (:user_id, :product_id, :comment);";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'comment' => $comment
        ]);
        return true;
    }

    public function update(int $id, int $user_id, int $product_id, string $comment) :bool
    {
        $sql = "UPDATE comments 
                SET (user_id = :user_id, 
                     product_id = :product_id,
                     comment = :comment) 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            'id' => $id,
            'user_id' => $user_id,
            'product_id' => $product_id,
            'comment' => $comment
        ]);
        return true;
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM comments 
                WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute(['id' => $id]);
        return true;
    }

}