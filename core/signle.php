<?php
namespace core;


/**
 * @desc      一对一聊天 (非公开)
 * @author    lijianwei    2014-3-4
 */
class signle
{
    
    //加入会话   开始聊天啦
    public function addSession(array $uids,  $keyword)
    {
        
        //从推荐系统中删除
        recommend::getInstance()->kickOutPeopleFromKeySet($uids, $keyword);

        
    }
}