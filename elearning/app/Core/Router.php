<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $uri, callable|array $handler): void
    {
        $this->addRoute('GET', $uri, $handler);
    }

    public function post(string $uri, callable|array $handler): void
    {
        $this->addRoute('POST', $uri, $handler);
    }

    public function dispatch(string $method, string $uri): void
    {
        $method = strtoupper($method);
        $uri = $this->normalizeUri($uri);

        $handler = $this->routes[$method][$uri] ?? null;

        if ($handler === null) {
            http_response_code(404);
            View::render('errors/404', ['title' => 'Halaman Tidak Ditemukan']);
            return;
        }

        if (is_callable($handler)) {
            $handler();
            return;
        }

        [$controllerClass, $action] = $handler;
        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            throw new RuntimeException("Action {$action} is not available.");
        }

        $controller->{$action}();
    }

    private function addRoute(string $method, string $uri, callable|array $handler): void
    {
        $uri = $this->normalizeUri($uri);
        $this->routes[$method][$uri] = $handler;
    }

    private function normalizeUri(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $basePath = rtrim(str_replace('/index.php', '', $scriptName), '/');

        if ($basePath !== '' && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath));
        }

        $path = trim($path, '/');

        return $path === '' ? '/' : '/' . $path;
    }
}
