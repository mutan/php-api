<?php

namespace App;

use PDO;

class DB
{
    protected static $instance = null;

    public function __construct() {}
    public function __clone() {}

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //PDO::FETCH_NUM or PDO::FETCH_ASSOC
                PDO::ATTR_EMULATE_PREPARES   => true,
            ];
            self::$instance = new PDO(
                "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_NAME'),
                getenv('DB_USER'),
                getenv('DB_PASSWORD'),
                $options
            );
        }
        return self::$instance;
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}