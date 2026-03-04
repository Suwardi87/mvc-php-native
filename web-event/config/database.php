<?php

namespace Config;

use PDO;
use PDOException;

class Database
{
    private $host = "localhost";
    private $db_name = "event_management";
    private $username = "root";
    private $password = "";

    public function getConnection()
    {
        try {
            return new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }
}