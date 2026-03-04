<?php

namespace App\Model;

use Config\Database;

class Article
{
    private $conn;
    private $table = 'articles';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll(): array
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll() ?? [];
    }

    public function insert(array $data): bool
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO {$this->table}(title, content) VALUES(?, ?)"
        );
        return $stmt->execute([
            $data['title'] ?? '',
            $data['content'] ?? ''
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->conn->prepare(
            "UPDATE {$this->table} SET title = ?, content = ? WHERE id = ?"
        );
        return $stmt->execute([
            $data['title'] ?? '',
            $data['content'] ?? '',
            $id
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->conn->prepare(
            "DELETE FROM {$this->table} WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}