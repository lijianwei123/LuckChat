<?php
namespace core;

use db\redisdb as redisDb;

/**
 * @desc      推荐系统
 * @author    lijianwei    2014-3-4
 */
class recommend extends singleton
{
    //插入关键词集合
    public function peopleJoinKeySet($uid, $keyword)
    {
        //有序集合
        redisDb::getInstance()->zAdd($keyword, $this->getNowTime(), $uid);
        //1天有效期
        redisDb::getInstance()->expire($keyword, 24*3600);
    }
    
    //查询有缘人  最多5人   1天之内输入的
    public function getLuckPeopleFromKeySet($keyword)
    {
        $start = strtotime("-1 day");
        $end = $this->getNowTime();
        
        return redisDb::getInstance()->zRangeByScore($keyword, $start, $end, array('withscores' => true, array('limit' => array(0, 5))));
    }
    
    //从关键词集合中剔除   uid支持 string or array  
    public function kickOutPeopleFromKeySet($uid, $keyword)
    {
        if(is_string($uid) || is_int($uid)) $uid = array($uid);
        
        array_unshift($uid, $keyword);
        
        call_user_func_array(array(redisDb::getInstance(), 'zRem'), $uid);
    }
    
    //获取当前时间
    protected function getNowTime()
    {
        list($msec, $sec) = explode(" ", microtime());
        return ((float)$msec + (float)$sec);
    }
}