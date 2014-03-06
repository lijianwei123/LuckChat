<?php
namespace core;

/**
 * @desc      基础控制器
 * @author    lijianwei    2014-3-6
 */
class baseController
{
    private $_tpl_vars = array();
    
    //只是加载
    public function display($tpl_name = '')
    {
        $tpl_name = trim($tpl_name, '/');
        extract($this->_tpl_vars, EXTR_OVERWRITE);
        require_once(__DIR__. DS. '..'. DS. 'views'. DS. $tpl_name. ".php");
    }
    public function assign($key, $val)
    {
        $this->_tpl_vars[$key] = $val;
    }
}
