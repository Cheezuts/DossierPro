<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {
        $class = str_replace('\\', '/', $class);
        if (file_exists(__DIR__ . '/' . $class . '.php')) {
            require_once __DIR__ . '/' . $class . '.php';
        }
    }
}
