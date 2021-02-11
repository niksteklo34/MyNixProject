<?php


namespace App\models;


use App\models\DB;

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

    public function getProductId($id)
    {
        $db_connect = (DB::getInstance())->connect();
        $query = "SELECT * FROM products WHERE id = " . $id;
        $resultQuery = $db_connect->query($query);
        $product = $resultQuery->fetch_object();
        return $product;
    }

}