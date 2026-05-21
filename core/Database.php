<?php

class Database
{

    private static $instance = null;

    public static function getConnection()
    {

        if (self::$instance == null) {

            require_once '../config/database.php';

            $db = new DatabaseConfig();

            self::$instance = $db->getConnection();
        }

        return self::$instance;
    }
}
