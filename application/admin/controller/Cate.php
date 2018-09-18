<?php
namespace app\admin\controller;
use app\admin\controller\Base;//Base为公共类做用户登录的认证
use think\Db;
use app\admin\model\Cate as CateModel; //引入cate模型，并修改别名为cateModel
class Cate extends Base
{
	public function lst()
	{
		$list=cateModel::paginate(3);//使用cateModel模型获取分页的数据，并且每页显示三行
		$this->assign('list',$list);//定义模板变量list并把分页数据赋值给他
		return $this->fetch();
	}
	public function add()
	{
		if(request()->isPost())
		{
			//需要验证的数据源
			$data=['catename'=>input('catename')];
			//验证器，需要验证的模块
			$validate=\think\Loader::validate('cate');
			if(!$validate->scene('add')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			
			if(Db::name('cate')->insert($data))
			{
				return $this->success('添加栏目成功','lst');
			}
			else
			{
				return $this->error('添失败');
			}
		}
		return $this->fetch();
	}
	public function edit()
	{
		$id=input('id');
		$cates=Db::name('cate')->find($id);
		$this->assign('cates',$cates);
		if(request()->isPost())
		{
			$data=['id'=>input('id'),
					'catename'=>input('catename')];

			$validate=\think\Loader::validate('cate');
			if(!$validate->scene('edit')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			$save=db('cate')->update($data);
			if($save!==false)
            {
                $this->success('修改栏目信息成功','lst');
            }
			else
			{
                $this->error('修改栏目失败！');
			}
			
		}
		
		return $this->fetch();
	}
	public function del()
	{
		$id=input('id');
		if($id!=1)
		{
			if($id=db('cate')->delete(input('id')))
			{
				$this->success('删除管理员成功!','lst');
			}
			else
			{
				$this->error('删除管理员失败！');
			}			
		}
		else
		{
			$this->error('初始化管理员不能删除！');
		}
		
	}
	
}