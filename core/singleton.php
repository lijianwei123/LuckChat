<?php
namespace core;
/**
 * @desc   	  单例
 * @author    lijianwei    2014-3-5
 */

class singleton
{
    private static $_obj = null;
    public static function getInstance()
    {
        if(self::$_obj == null) {
            self::$_obj = new static();
        } else {
            return self::$_obj;
        }
        
    }
}