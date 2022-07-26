<?php

class Database
{
    private static $server = 'localhost';
    private static $dbName = 'mvc';
    private static $dbUser = 'root';
    private static $dbPass = '';

    public static function Connect()
    {
        try {
            $connection = new PDO('mysql:host='.self::$server.';dbname='.self::$dbName.';charset=utf8',self::$dbUser,self::$dbPass);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $e) {
            return "Error: ".$e->getMessage();
        }
    }
}