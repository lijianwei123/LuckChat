<?php
/**
 * @desc      推荐系统
 * @author    lijianwei    2014-3-4
 */

class recommend
{
    //插入关键词
    public function insert($uid, $keyword)
    {
        //有序集合
        redisDb::getInstance()->zAdd($keyword, $this->getNowTime(), $uid);
    }
    
    //查询有缘人  最多5人   1天之内输入的
    public function getLuckPeople($keyword)
    {
        $start = strtotime("-1 day");
        $end = $this->getNowTime();
        
        return redisDb::getInstance()->zRangeByScore($keyword, $start, $end, array('withscores' => true, array('limit' => array(0, 5))));
    }
    
    
    
    
    
    //获取当前时间
    protected function getNowTime()
    {
        list($msec, $sec) = explode(" ", microtime());
        return ((float)$msec + (float)$sec);
    }
    
   
    
    
    
    
}