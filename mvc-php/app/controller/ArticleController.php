<?php

namespace App\Controller;

use App\Model\Article;

class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new Article();
    }

    public function index(): void
    {
        $articles = $this->model->getAll();
        $this->view('article/index', ['articles' => $articles]);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->insert($_POST);
            $location = rtrim(BASE_URL, '/') . '/article/index';
            header('Location: ' . $location);
            exit;
        }
    }

    public function destroy($id): void
    {
        $this->model->delete($id);
        $location = rtrim(BASE_URL, '/') . '/article/index';
        header('Location: ' . $location);
        exit;
    }

    private function view(string $view, array $data = []): void
    {
        extract($data);
        $viewPath = BASE_PATH . '/app/view/' . $view . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "View {$view} tidak ditemukan";
        }
    }
}
