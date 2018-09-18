<?php
namespace app\admin\controller;
use app\admin\controller\Base;//Base为公共类做用户登录的认证
use think\Db;
use app\admin\model\Links as LinksModel; //引入links模型，并修改别名为linksModel
class Links extends Base
{
	public function lst()
	{
		$list=LinksModel::paginate(3);//使用linksModel模型获取分页的数据，并且每页显示三行
		$this->assign('list',$list);//定义模板变量list并把分页数据赋值给他
		return $this->fetch();
	}
	public function add()
	{
		if(request()->isPost())
		{
			//需要验证的数据源
			$data=['title'=>input('title'),'url'=>input('url'),
				'desc'=>input('desc')];
			//验证器，需要验证的模块
			$validate=\think\Loader::validate('links');
			if(!$validate->scene('add')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			
			if(Db::name('links')->insert($data))
			{
				return $this->success('添加链接成功','lst');
			}
			else
			{
				return $this->error('添加链接失败');
			}
		}
		return $this->fetch();
	}
	public function edit()
	{
		$id=input('id');
		$links=Db::name('links')->find($id);
		$this->assign('links',$links);
		if(request()->isPost())
		{
			$data=['id'=>input('id'),
					'title'=>input('title'),
					'url'=>input('url'),
					'desc'=>input('desc')];
			

			$validate=\think\Loader::validate('links');
			if(!$validate->scene('edit')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			

			if(db('links')->update($data))
			{
				$this->success('修改链接成功','lst');

			}
			else
			{
				$this->error('修改链接失败！');
			}
			
		}
		
		return $this->fetch();
	}
	public function del()
	{
		$id=input('id');
		
			if($id=db('links')->delete(input('id')))
			{
				$this->success('删除链接成功!','lst');
			}
			else
			{
				$this->error('删除链接失败！');
			}			
		
		
		
	}
	
}