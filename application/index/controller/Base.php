<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Base extends Controller //基类控制器
{

	public function _initialize()//初始化方法，所有继承该控制器的子类都必须先执行以下操作
	{
	    $this->right();//给每个模板分配右侧的点击数和推荐文章数据
	    $cateres=Db::name('cate')->order('id asc')->select();//查询cate标签
	    $tagres=db('tags')->order('id desc')->select();//查询tags标签
	    $this->assign(['cateres'=>$cateres,'tagres'=>$tagres]);
	}
	public function right()//右侧热门点击。推荐阅读获取数据并把值分配到模板
    {
        $clickres=db('article')->order('click desc')->limit(8)->select();//查询点击数多的文章并降序
        $tjres=db('article')->where('state','=',1)->order('click desc')->limit(8)->select();//查询已推荐的文章，按点击数降序
        $this->assign(array(
            'clickres'=>$clickres,
            'tjres'=>$tjres
        ));
    }
}