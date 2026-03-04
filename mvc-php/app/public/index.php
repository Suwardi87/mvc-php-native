<?php
// Aktifkan error (development)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Define base path
define('BASE_PATH', dirname(__DIR__) . '/..');

// Base URL untuk redirect (cocok untuk Laragon/XAMPP)
$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$baseUrl = rtrim(str_replace('/index.php', '', $scriptName), '/');
define('BASE_URL', $baseUrl);

// Autoload sederhana tanpa Composer
spl_autoload_register(function ($class) {
    $prefixes = [
        'App\\' => BASE_PATH . '/app/',
        'Core\\' => BASE_PATH . '/core/',
        'Config\\' => BASE_PATH . '/config/',
    ];

    foreach ($prefixes as $prefix => $baseDir) {
        $len = strlen($prefix);
        if (strncmp($class, $prefix, $len) !== 0) {
            continue;
        }

        $relativeClass = substr($class, $len);
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
        return;
    }
});

// Jalankan aplikasi
$app = new \Core\App();
$app->run();
