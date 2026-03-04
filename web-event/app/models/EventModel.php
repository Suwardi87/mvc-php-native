<?php

namespace App\Models;

use Core\Model;
use PDO;

class EventModel extends Model
{
    public function getAll()
    {
        $query = 'SELECT * FROM events';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = 'SELECT * FROM events WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = 'INSERT INTO events (judul_event, tanggal_event, lokasi, kuota, deskripsi)
                  VALUES (:judul_event, :tanggal_event, :lokasi, :kuota, :deskripsi)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul_event', $data['judul_event']);
        $stmt->bindParam(':tanggal_event', $data['tanggal_event']);
        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':kuota', $data['kuota'], PDO::PARAM_INT);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);

        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $query = 'UPDATE events
                  SET judul_event = :judul_event,
                      tanggal_event = :tanggal_event,
                      lokasi = :lokasi,
                      kuota = :kuota,
                      deskripsi = :deskripsi
                  WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':judul_event', $data['judul_event']);
        $stmt->bindParam(':tanggal_event', $data['tanggal_event']);
        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':kuota', $data['kuota'], PDO::PARAM_INT);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
