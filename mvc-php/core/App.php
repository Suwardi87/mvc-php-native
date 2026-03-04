<?php

namespace Core;

class App
{
    protected $controller = 'ArticleController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        $controllerPath = BASE_PATH . '/app/controller/' . ucfirst($url[0] ?? '') . 'Controller.php';

        if (file_exists($controllerPath)) {
            $this->controller = ucfirst($url[0] ?? '') . 'Controller';
            unset($url[0]);
        }

        if (isset($url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = array_values($url);
    }

    public function run()
    {
        $controllerClass = 'App\\Controller\\' . $this->controller;
        $controller = new $controllerClass();

        if (method_exists($controller, $this->method)) {
            call_user_func_array([$controller, $this->method], $this->params);
        } else {
            echo "Method {$this->method} tidak ditemukan di {$this->controller}";
        }
    }

    private function parseUrl(): array
    {
        return explode('/', $_GET['url'] ?? 'article/index');
    }
}