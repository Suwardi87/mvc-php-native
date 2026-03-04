<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class Config
{
    private static array $cache = [];

    public static function get(string $file): array
    {
        if (isset(self::$cache[$file])) {
            return self::$cache[$file];
        }

        $path = BASE_PATH . '/config/' . $file . '.php';

        if (!file_exists($path)) {
            throw new RuntimeException("Config file {$file} not found.");
        }

        $config = require $path;

        if (!is_array($config)) {
            throw new RuntimeException("Config file {$file} must return an array.");
        }

        self::$cache[$file] = $config;

        return $config;
    }
}
