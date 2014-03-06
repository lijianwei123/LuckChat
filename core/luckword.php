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
    private $_wordRankKey = 'word:rank';
    //set
    private $_inValidKey = 'word:invalid';
     
    //是否是非法词语
    public function isInValidWord($word = '')
    {
        return  redis::getInstance()->sismember($this->_inValidKey, $word);
    }
     
    //更新  幸运词的频率
    //@todo  可以异步更新
    public function updateWordLuckRank($luckWord = '')
    {
        return redis::getInstance()->zIncrBy($this->_wordRankKey, 1, $luckWord);
    } 
    
}