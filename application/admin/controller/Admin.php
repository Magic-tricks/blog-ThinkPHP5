<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Admin as AdminModel; //引入Admin模型，并修改别名为AdminModel
use app\admin\controller\Base;//Base为公共类做用户登录的认证
class Admin extends Base
{


    public function lst()
	{
		$list=AdminModel::paginate(3);//使用AdminModel模型获取分页的数据，并且每页显示三行
		$this->assign('list',$list);//定义模板变量list并把分页数据赋值给他
		return $this->fetch();
	}
	public function add()
	{
		if(request()->isPost())
		{
			//需要验证的数据源
			$data=['username'=>input('username'),'password'=>input('password')];
			//验证器，需要验证的模块
			$validate=\think\Loader::validate('admin');
			if(!$validate->scene('add')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			
			if(Db::name('admin')->insert($data))
			{
				return $this->success('添加管理员成功','lst');
			}
			else
			{
				return $this->error('添加管理员失败');
			}
		}
		return $this->fetch();
	}
	public function edit()
	{
		$id=input('id');
		$admins=Db::name('admin')->find($id);
		$this->assign('admins',$admins);
		if(request()->isPost())
		{
			$data=['id'=>input('id'),
					'username'=>input('username')];
			if(input('password'))
					{
						$data['password']=input('password');
					}
					else
					{
						$data['password']=
						$admins['password'];
					}

			$validate=\think\Loader::validate('admin');
			if(!$validate->scene('edit')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			
            $save=db('admin')->update($data);
			if($save!==false)
			{
				$this->success('修改管理员信息成功','lst');

			}
			else
			{
				$this->error('修改管理员失败！');
			}
			
		}
		
		return $this->fetch();
	}
	public function del()
	{
		$id=input('id');
		if($id!=1)
		{
			if($id=db('admin')->delete(input('id')))
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

	public function logout()
    {
        session(null);
        $this->success('退出成功！','login/index');
    }
	
}