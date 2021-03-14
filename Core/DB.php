<?php

namespace Core;

use Core\Exceptions\DbException;
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

    public function configMapper()
    {
        $this->host = getenv('DB_HOST');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
        $this->db_name = getenv('DB_NAME');;
    }

    public function connect()
    {
        $this->configMapper();
        if ($this->host && $this->user && $this->password && $this->db_name) {
            return $db_connect = new PDO("mysql:dbname={$this->db_name};host={$this->host}", $this->user, $this->password);
        } else {
            throw new DbException('DB is not connected');
        }
    }
}