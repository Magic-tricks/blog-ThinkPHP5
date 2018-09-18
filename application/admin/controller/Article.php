<?php
namespace app\admin\controller;
use app\admin\controller\Base;//Base为公共类做用户登录的认证
use think\Db;
use app\admin\model\Article as ArticleModel; //引入Article模型，并修改别名为ArticleModel
class Article extends Base
{
	public function lst()
	{
		//$list=ArticleModel::paginate(3);//使用ArticleModel模型获取分页的数据，并且每页显示三行

        //$list=db('article')->alias('a')->join('cate c','c.id=a.cateid')->field('a.id,a.title,a.pic,a.author,a.state,c.catename')->paginate(3);
        //实现数据表的连接查询方法一：数据库的连接查询，把article表改别名为a，连接表cate该别名为c，并且连接条件为c.id=a.cateid,field为需要查询的字段，paginate(3)为分页，３为每页显示的条数、

        $list=ArticleModel::paginate(3);
        //方法二：关联查询：使用关联查询查询两个表的数据，需要在主表模型article中创建一个需要关联的表名的以该表名命名的方法，并且使用belongsTo去链接
        //特别注意：如需在模板中调用关联表cate表的数据，一定要按照{$vo.cate.catename}格式输出数据
		$this->assign('list',$list);//定义模板变量list并把分页数据赋值给他
		return $this->fetch();
	}
	public function add()
	{
		if(request()->isPost()) {
            //需要验证的数据源
            $data = ['title' => input('title'),
                'author' => input('author'),
                'desc' => input('desc'),
                'keywords' => str_replace('，',',',input('keyword')),
                'content' => input('content'),
                'cateid' => input('cateid'),
                'time' => time(),
            ];
            if (input('state') == 'on') {
                $data['state'] = 1;
            }
            if ($_FILES['pic']['tmp_name'])
            {
                $file=request()->file('pic');//文件上传
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');//移动文件，DS代表/或者\斜杠
                $data['pic']='/static/uploads/'.$info->getSaveName();//图片的保存路径

            }

			//验证器，需要验证的模块
			$validate=\think\Loader::validate('Article');
			if(!$validate->scene('add')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			
			if(Db::name('article')->insert($data))
			{
				return $this->success('添加文章成功','lst');
			}
			else
			{
				return $this->error('添加文章失败');
			}
		}
		$cateres=db('cate')->select();
		$this->assign('cateres',$cateres);
		return $this->fetch();
	}
	public function edit()
	{
		$id=input('id');
		$Article=Db::name('article')->find($id);
		$this->assign('articles',$Article);
		if(request()->isPost()) {
            $data = ['id' => input('id'),
                'title' => input('title'),
                'author' => input('author'),
                'desc' => input('desc'),
                'keywords' => str_replace('，',',',input('keyword')),
                'content' => input('content'),
                'cateid' => input('cateid'),
                'time' => time()];
            if (input('state') == 'on') {
                $data['state'] = 1;
            }
            else
            {
                $data['state']=0;
            }
            if ($_FILES['pic']['tmp_name'])
            {

                $file=request()->file('pic');
                $info=$file->move(ROOT_PATH.'public'.DS.'static/uploads');
                $data['pic']='/static/uploads/'.$info->getSaveName();
            }
			$validate=\think\Loader::validate('Article');
			if(!$validate->scene('edit')->check($data))//使用add场景进行验证
			{
				$this->error($validate->getError());die();
			}
			

			if(db('Article')->update($data))
			{
				$this->success('修改文章成功','lst');

			}
			else
			{
				$this->error('修改文章失败！');
			}
			
		}
        $cateres=db('cate')->select();
        $this->assign('cateres',$cateres);
		return $this->fetch();
	}
	public function del()
	{
		$id=input('id');
		
			if($id=db('Article')->delete(input('id')))
			{
				$this->success('删除文章成功!','lst');
			}
			else
			{
				$this->error('删除文章失败！');
			}			
		
		
		
	}
	
}