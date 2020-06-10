<?php

namespace Core\classes;

use Core\classes\Database;

class Model extends Database
{
    public static $tableName = '';

    function __construct()
    {
        echo 'This is me';
    }

    public static function getAll()
    {

        return self::query('SELECT * FROM ' . self::getTableName() . ';');
    }

    public static function find($id)
    {
        return self::query('SELECT * FROM ' . self::getTableName() . ';')[$id];
    }

    function save()
    {
    }

    function delete()
    {
    }

    function update()
    {
    }

    function add()
    {
    }

    private  static function getTableName()
    {
        if (self::$tableName != '') return self::$tableName;
        else {
            $className = explode('\\', get_called_class());
            return  strtolower($className[sizeof($className) - 1]) . 's';
        }
    }
}
