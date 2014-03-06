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
   $flag = '';
   if(substr($className, -10, 10) === 'Controller') {
       $flag = 'Controller';
   }
   require_once(__DIR__. DS. str_replace("\\", DS, ltrim($className, "\\")). ".php");
   
   //runkit 修改代码
   modifyCode($flag, $className);
}

function modifyCode($flag, $className)
{
    switch($flag) {
        case 'Controller':
             //加上基类
             $class = new ReflectionClass($className);
             $docComment = $class->getDocComment();
             if($docComment && (false !== strpos($docComment, '@ViewRender'))) {
                 if(!extension_loaded('runkit')) trigger_error('depend runkit extension', E_USER_ERROR);
                 require_once(__DIR__. DS . 'core'. DS. 'baseController.php');
                 runkit_class_adopt($className, "\core\baseController");
             }
        break;
            
    }
}

$className = "\\module\\". $m_name. "\\". $c_name. 'Controller';
$obj = new $className;
call_user_func_array(array($obj, $a_name), array());