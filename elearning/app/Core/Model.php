<?php
declare(strict_types=1);

namespace App\Core;

abstract class Model
{
    protected Database $database;

    public function __construct(?Database $database = null)
    {
        $this->database = $database ?? new Database();
    }
}
