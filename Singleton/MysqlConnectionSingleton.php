<?php

class MysqlConnectionSingleton
{
    public static $connection;

    private function __construct()
    {
        self::$connection = new mysqli('localhost', 'uac', 'testes');
    }

    /**
     * Get the value of connection
     */ 
    public static function getConnection()
    {
        if (self::$connection == null) {
            self::$connection = new MysqlConnectionSingleton();
        } 

        return self::$connection;
    }
}