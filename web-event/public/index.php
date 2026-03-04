<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../app/models/EventModel.php';
require_once __DIR__ . '/../app/controllers/EventController.php';

use App\Controllers\EventController;

$controller = new EventController();

if (!empty($_GET['action'])) {
    if ($_GET['action'] === 'create') {
        $controller->create();
        exit;
    }

    if ($_GET['action'] === 'store') {
        $controller->store();
        exit;
    }
}

$route = trim($_GET['url'] ?? 'events', '/');
if ($route === '') {
    $route = 'events';
}

$segments = explode('/', $route);
$resource = $segments[0] ?? 'events';
$action = $segments[1] ?? null;
$idSegment = $segments[2] ?? null;
$id = ($idSegment !== null && ctype_digit($idSegment)) ? (int)$idSegment : null;

if ($resource !== 'events') {
    http_response_code(404);
    echo '404 Not Found';
    exit;
}

if ($action === null) {
    $controller->index();
} elseif ($action === 'create') {
    $controller->create();
} elseif ($action === 'store') {
    $controller->store();
} elseif ($action === 'show' && $id !== null) {
    $controller->show($id);
} elseif ($action === 'edit' && $id !== null) {
    $controller->edit($id);
} elseif ($action === 'update' && $id !== null) {
    $controller->update($id);
} else {
    http_response_code(404);
    echo '404 Not Found';
}
