<?php
/**
 * @desc      入口文件
 * @author    lijianwei    2014-3-4
 */
define("DS", DIRECTORY_SEPARATOR);


$m_name = @$_GET['m'] ?: 'main';
$c_name = @$_GET['c'] ?: 'index';
$a_name = @$_GET['a'] ?: 'index';

//只支持命名空间加载
function __autoload($className = '')
{
   require_once(__DIR__. DS. str_replace("\\", DS, ltrim($className, "\\")). ".php"); 
}

$className = "\\module\\". $m_name. "\\". $c_name;

call_user_func_array(array($className, $a_name), array());