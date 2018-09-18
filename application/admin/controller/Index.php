<?php
namespace app\admin\controller;
use app\admin\controller\Base;//Base为公共类做用户登录的认证
class Index extends Base
{

    public function index()
	{
		return $this->fetch();
	}
	
}