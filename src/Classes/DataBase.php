<?php

namespace App\Classes;

use Exception;
use PDO;

/**
 * DB Singleton
 */
class DataBase
{
    protected static PDO $db;

    protected function __construct()
    {
        /*_*/
    }

    public static function db()
    {
        if (empty(static::$db)) {
            $servername = "sql11.freemysqlhosting.net";
            $db = "sql11705148";
            $username = "sql11705148";
            $password = "3Um6kErmKJ";
            try {
                static::$db = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
                // set the PDO error mode to exception
                static::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                static::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return static::$db;
    }
}