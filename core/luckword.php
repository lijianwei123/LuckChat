<?php
namespace core;

use db\redisdb as redis;

/**
 * @desc      幸运之门
 * @author    lijianwei    2014-3-5
 */
class luckWord extends singleton
{
    //zset
    private $_workRankKey = 'word:rank';
    //set
    private $_inValidKey = 'word:invalid';
     
    //是否是非法词语
    public function isInValidWord($word = '')
    {
        return  redis::getInstance()->sismember($this->_inValidKey, $word);
    }
    
    //更新  
    //@todo  可以异步更新
    public function updateWordLuckRank($luckWord = '')
    {
        
    } 
    
}