<?php


namespace App\Models;

use Core\DB;

class User
{

    public $db_connect;
    public BaseModel $baseModel;

    public function __construct()
    {
        $this->db_connect = DB::getInstance()->connect();
        $this->baseModel = new BaseModel();
    }

    public function createUser($name, $surname, $email, $password)
    {
        $connect = $this->db_connect;
        $this->baseModel->write('user','name, surname, email, password', [$name,$surname,$email,$password]);
    }

    public function userExist($email)
    {
        return $this->baseModel->get("user","*","email = '$email'");
    }

    public function fegAllOrdersForUser($personId)
    {
        $query = "select user.name,surname, products.title,price,date from user join users_orders on users_orders.user_id = user.id join products on products.id = users_orders.product_id WHERE user.id = '{$personId}';";
        return $this->baseModel->get(null,null,null,null,$query);
    }

    public function makeOrder(int $user, int $product)
    {
        $date = date("Y-m-d H:i:s");
        $this->baseModel->write('users_orders', 'user_id, product_id, date', [$user, $product, $date]);
    }
}