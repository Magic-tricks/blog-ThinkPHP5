<?php
namespace app\admin\controller;
use app\admin\controller\Base;//Base为公共类做用户登录的认证
use think\Db;
class Tags extends Base
{
	public function lst()
	{
		$list=db('tags')->paginate(3);//使用linksModel模型获取分页的数据，并且每页显示三行
		$this->assign('list',$list);//定义模板变量list并把分页数据赋值给他
		return $this->fetch();
	}
	public function add()
	{
		if(request()->isPost())
		{
			//需要验证的数据源
			$data=['tagname'=>input('tagname')];
			//验证器，需要验证的模块
			$validate=\think\Loader::validate('tags');
			if(!$validate->scene('add')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			
			if(Db::name('tags')->insert($data))
			{
				return $this->success('添加tags标签成功','lst');
			}
			else
			{
				return $this->error('添加tags标签失败');
			}
		}
		return $this->fetch();
	}
	public function edit()
	{
		$id=input('id');
		$links=Db::name('tags')->find($id);
		$this->assign('tags',$links);
		if(request()->isPost())
		{
			$data=['id'=>input('id'),
					'tagname'=>input('tagname'),
					];


			$validate=\think\Loader::validate('tags');
			if(!$validate->scene('edit')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			

			if(db('tags')->update($data))
			{
				$this->success('修改tags标签成功','lst');

			}
			else
			{
				$this->error('修改tags标签失败！');
			}
			
		}
		
		return $this->fetch();
	}
	public function del()
	{
		$id=input('id');
		
			if($id=db('tags')->delete(input('id')))
			{
				$this->success('删除tags标签成功!','lst');
			}
			else
			{
				$this->error('删除tags标签失败！');
			}			
		
		
		
	}
	
}