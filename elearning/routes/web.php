<?php
declare(strict_types=1);

use App\Controllers\CourseController;
use App\Controllers\HomeController;

/** @var App\Core\Router $router */
$router->get('/', [HomeController::class, 'index']);
$router->get('/kelas', [CourseController::class, 'index']);
$router->get('/courses', [CourseController::class, 'index']);