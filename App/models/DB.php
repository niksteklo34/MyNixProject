<?php

namespace App\models;

use mysqli;

class DB
{
    private static $instance;

    public static function getInstance() : DB
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // реализовать на снглтон
    private $host = '192.168.10.10';
    private $user = 'homestead';
    private $password = 'secret';
    private $db_name = 'coffezin';


    public function connect()
    {
        return $db_connect = new mysqli($this->host, $this->user, $this->password, $this->db_name);
    }

}