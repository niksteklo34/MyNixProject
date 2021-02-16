<?php


namespace App\models;

use PDO;

class BaseModel
{
    private $db_connect;

    public function __construct()
    {
        $this->db_connect = DB::getInstance()->connect();
    }

    public function get($table, $rows = '*', $where = null, $search = null, $query = null)
    {
        $connect = $this->db_connect;
        if ($query == null) {
            $query = 'SELECT ' . $rows . ' FROM ' . $table;
            if ($where != null) $query .= ' WHERE ' . $where;
            if ($search != null) $query .= ' ORDER BY ' . $search;
        }
        $prepareQuery = $connect->prepare($query);
        $prepareQuery->execute();
        return $prepareQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function write($table, $rows, $values)
    {
        $connect = $this->db_connect;
        $query = 'INSERT INTO ' . $table;
        if($rows != null)
        {
            $query .= ' ('.$rows.') ';
        }
        for($i = 0; $i < count($values); $i++)
        {
            if(is_string($values[$i]))
                $values[$i] = '"'.$values[$i].'"';
        }
        $values = implode(',',$values);
        $query .= ' VALUES (' . $values . ')';
        $prepareQuery = $connect->prepare($query);
        $prepareQuery->execute();
        if ($prepareQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $where = null)
    {
        $connect = $this->db_connect;
        if ($where == null) {
            $query = 'DELETE FROM ' . $table;
        } else {
            $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        }
        $prepareQuery = $connect->prepare($query);
        $prepareQuery->execute();
        if ($prepareQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table,array $rows, $where, $condition)
    {
        $connect = $this->db_connect;
        for($i = 0; $i < count($where); $i++)
        {
            if($i%2 != 0)
            {
                var_dump($where);
                if(is_string($where[$i]))
                {
                    if(($i+1) != null)
                        $where[$i] = '"'.$where[$i].'" AND ';
                    else
                        $where[$i] = '"'.$where[$i].'"';
                }
            }
        }
        $where = implode($condition,$where);
        $query = 'UPDATE ' . $table . ' SET ';
        $keys = array_keys($rows);
        for($i = 0; $i < count($rows); $i++)
        {
            if(is_string($rows[$keys[$i]]))
            {
                $query .= $keys[$i].'="'.$rows[$keys[$i]].'"';
            }
            else
            {
                $query .= $keys[$i].'='.$rows[$keys[$i]];
            }
            if($i != count($rows)-1)
            {
                $query .= ',';
            }
        }
        $query .= ' WHERE ' . $where;
        $prepareQuery = $connect->prepare($query);
        $prepareQuery->execute();
        if ($prepareQuery) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($table, $id)
    {
        $db_connect = $this->db_connect;
        $query = "SELECT * FROM " . $table . " WHERE id = " . $id;
        $dbProduct = $db_connect->prepare($query);
        $dbProduct->execute();
        return $product = $dbProduct->fetch(PDO::FETCH_OBJ);
    }

}