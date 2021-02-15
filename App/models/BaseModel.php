<?php


namespace App\models;


use App\models\DB;
use PDO;

class BaseModel
{
    // как использовать селект с продуктом
    public function select($data,$tableName,$search = '')
    {
        $query = "SELECT {$data} FROM {$tableName} {$search}";
    }

    public function insert($tableName, $columns, $data)
    {
        $query = "INSERT INTO {$tableName}({$columns}) VALUES ('{$data}')";
    }

    public function delete($tableName, $condition)
    {
        $query = "DELETE FROM {$tableName} WHERE {$condition}";
    }

    public function update($tableName, $columnSetNewData, $condition)
    {
        $query = "UPDATE {$tableName} SET {$columnSetNewData} WHERE {$condition}";
    }

    public function getById($table, $id)
    {
        $db_connect = (DB::getInstance())->connect();
        $query = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $dbProduct = $db_connect->prepare($query);
        $dbProduct->execute();
        return $product = $dbProduct->fetch(PDO::FETCH_OBJ);
    }

}