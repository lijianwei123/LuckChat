<?php
/**
 * @desc      redis
 * @author    lijianwei    2014-3-4
 */

class redisDb extends Db
{
    public static function connect()
    {
        $redis = new Redis();
        $redis->connect("168.192.122.31", 6379);  
        return $redis; 
    }
}