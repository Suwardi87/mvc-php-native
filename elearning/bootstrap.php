<?php
declare(strict_types=1);

define('BASE_PATH', __DIR__);

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    $baseDir = BASE_PATH . '/app/';

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$baseUrl = rtrim(str_replace('/index.php', '', $scriptName), '/');
define('BASE_URL', $baseUrl);

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        $path = ltrim($path, '/');

        if ($path === '') {
            return BASE_URL === '' ? '/' : BASE_URL;
        }

        if (BASE_URL === '') {
            return '/' . $path;
        }

        return BASE_URL . '/' . $path;
    }
}
