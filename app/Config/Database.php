<?php

namespace CobaMVC\Config;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(): \PDO
    {
        if(self::$pdo == null){
            self::$pdo = new \PDO("pgsql:host=localhost;port=5432;dbname=elearning;", "postgres", "postgres");
        }
        return self::$pdo;
    }
}