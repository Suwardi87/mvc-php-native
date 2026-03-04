<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class App
{
    private Router $router;

    public function __construct(?Router $router = null)
    {
        $this->router = $router ?? new Router();
    }

    public function loadRoutes(string $path): void
    {
        if (!file_exists($path)) {
            throw new RuntimeException('Routes file not found.');
        }

        $router = $this->router;
        require $path;
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        $this->router->dispatch($method, $uri);
    }
}
