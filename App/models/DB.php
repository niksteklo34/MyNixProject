<?php

namespace App\models;

use App\exceptions\DbException;
use PDO;

class DB
{
    private static $instance;

    private $host;
    private $user;
    private $password;
    private $db_name;

    public static function getInstance() : DB
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $dbConfig = require_once dirname(__DIR__) . '/config/db_config.php';
        $this->host = $dbConfig['host'];
        $this->user = $dbConfig['user'];
        $this->password = $dbConfig['password'];
        $this->db_name = $dbConfig['db_name'];
    }

    public function connect()
    {
        if ($this->host && $this->user && $this->password && $this->db_name) {
            return $db_connect = new PDO("mysql:dbname={$this->db_name};host={$this->host}", $this->user, $this->password);
        } else {
            throw new DbException('DB is not connected');
        }
    }

}