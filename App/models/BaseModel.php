<?php


namespace App\models;

use PDO;

class BaseModel
{
    // как использовать селект с продуктом
    public function get($data,$tableName,$search = null)
    {
        return "SELECT {$data} FROM {$tableName} {$search}";
    }

    public function write($tablesName, $columns, $data)
    {
        return "INSERT INTO {$tablesName}({$columns}) VALUES ({$data})";
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