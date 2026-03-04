<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'layouts/main'): void
    {
        $viewPath = BASE_PATH . '/app/Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new RuntimeException("View {$view} not found.");
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $viewPath;
        $content = (string) ob_get_clean();

        $layoutPath = BASE_PATH . '/app/Views/' . $layout . '.php';

        if (file_exists($layoutPath)) {
            require $layoutPath;
            return;
        }

        echo $content;
    }
}
