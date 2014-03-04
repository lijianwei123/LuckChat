<?php
/**
 * @desc      db连接
 * @author    lijianwei    2014-3-4
 */
class Db
{
    private static $_conn = null;
    public static function getInstance()
    {
        if(self::$_conn == null) {
            return self::$_conn = static::connect();
        } else {
            return self::$_conn; 
        }
    }
}