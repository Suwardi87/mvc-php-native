<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Model;
use PDOException;

class Course extends Model
{
    public function all(): array
    {
        $connection = $this->database->connection();

        if ($connection === null) {
            return $this->sampleClasses();
        }

        try {
            $statement = $connection->query(
                'SELECT k.id, k.nama_kelas, u.nama AS pengajar
                 FROM kelas k
                 INNER JOIN users u ON u.id = k.users_id
                 ORDER BY k.id DESC'
            );

            $classes = $statement->fetchAll();

            if (!is_array($classes) || $classes === []) {
                return $this->sampleClasses();
            }

            return $classes;
        } catch (PDOException) {
            return $this->sampleClasses();
        }
    }

    private function sampleClasses(): array
    {
        return [
            [
                'id' => 1,
                'nama_kelas' => 'PHP MVC Dasar',
                'pengajar' => 'Budi Pengajar',
            ],
            [
                'id' => 2,
                'nama_kelas' => 'Database MySQL untuk Pemula',
                'pengajar' => 'Budi Pengajar',
            ],
        ];
    }
}