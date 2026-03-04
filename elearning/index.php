<?php
declare(strict_types=1);

require __DIR__ . '/bootstrap.php';

use App\Core\App;

$app = new App();
$app->loadRoutes(__DIR__ . '/routes/web.php');
$app->run();
