<?php
namespace core;

/**
 * @desc      基础控制器
 * @author    lijianwei    2014-3-6
 */
class baseController
{
    //只是加载
    public function display($tpl_name = '')
    {
        $tpl_name = trim($tpl_name, '/');
        require_once(__DIR__. DS. '..'. DS. 'views'. DS. $tpl_name. ".php");
    }
}
