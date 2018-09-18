<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller//admin模块下的基类控制器，
{
    public function _initialize()//初始化方法，检测用户是否登录，没登录则不允许进系统
    {
        if(!session('username'))
        {
            $this->error('请先登录系统','Login/index');

        }
    }
}