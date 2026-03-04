<?php

namespace Core;

use Config\Database;

class Model
{
    protected $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}