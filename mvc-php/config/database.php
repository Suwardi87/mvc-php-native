<?php

namespace Config;

use PDO;

class Database
{
    private $host = 'localhost';
    private $db_name = 'my_database';
    private $username = 'root';
    private $password = '';
    private $charset = 'utf8mb4';

    public function connect(): PDO
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
            return new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (\Exception $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }
}