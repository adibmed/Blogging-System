<?php

namespace Core\classes;

use PDO;
use PDOException;

class Database
{
    public static function connect()
    {
        try {

            $pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error!: ' . $e->getMessage() . '<br>';
            die();
        }
    }

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }
}
