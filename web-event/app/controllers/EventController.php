<?php

namespace App\Controllers;

use App\Models\EventModel;

class EventController
{
    public function index()
    {
        $model = new EventModel();
        $events = $model->getAll();

        require __DIR__ . '/../views/events/index.php';
    }

    public function show($id)
    {
        $model = new EventModel();
        $event = $model->getById($id);

        if (!$event) {
            http_response_code(404);
            echo 'Event tidak ditemukan';
            return;
        }

        require __DIR__ . '/../views/events/show.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/events/create.php';
    }

    public function store()
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            return;
        }

        $model = new EventModel();
        $model->create($this->collectRequestData());

        header('Location: index.php?url=events');
        exit;
    }

    public function edit($id)
    {
        $model = new EventModel();
        $event = $model->getById($id);

        if (!$event) {
            http_response_code(404);
            echo 'Event tidak ditemukan';
            return;
        }

        require __DIR__ . '/../views/events/edit.php';
    }

    public function update($id)
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            http_response_code(405);
            echo 'Method Not Allowed';
            return;
        }

        $model = new EventModel();

        if (!$model->getById($id)) {
            http_response_code(404);
            echo 'Event tidak ditemukan';
            return;
        }

        $model->update($id, $this->collectRequestData());

        header('Location: index.php?url=events/show/' . $id);
        exit;
    }

    private function collectRequestData()
    {
        return [
            'judul_event' => trim($_POST['judul_event'] ?? ''),
            'tanggal_event' => $_POST['tanggal_event'] ?? '',
            'lokasi' => trim($_POST['lokasi'] ?? ''),
            'kuota' => (int) ($_POST['kuota'] ?? 0),
            'deskripsi' => trim($_POST['deskripsi'] ?? ''),
        ];
    }
}
