<?php 
namespace db;

class db
{
    private static $_conn = null;
    
    public static function getInstance()
    {
        if(self::$_conn)
            return self::$_conn = static::connect();
        return self::$_conn;
    }
    
}


?>