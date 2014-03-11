<?php 
namespace module\main;

/**
 * 
 * 首页
 * @author Administrator
 * @ViewRender
 */
class indexController
{
    public function index()
    {
        $this->assign("site", "测试");
        $this->display('main/index');
    }
}
?>