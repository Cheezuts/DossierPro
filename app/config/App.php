<?php

namespace App;

//echo 'App.php is included';

require_once 'Database.php';

class App
{
    const DB_NAME = 'dossierpro';
    const DB_USER = 'root';
    const DB_PASS = 'toor';
    const DB_HOST = 'localhost';

    private static $database;

    public static function getDb()
    {
        if (self::$database === null) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST); // Correction de l'instanciation de la classe Database
        }

        return self::$database;
    }
}
