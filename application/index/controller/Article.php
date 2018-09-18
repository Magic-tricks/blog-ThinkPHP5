<?php
namespace app\index\controller;
use app\index\controller\Base;
class Article extends Base
{
	public function article()
	{
	    $arid=input('arid');
	    db('article')->where('id',$arid)->setInc('click',1);
	    $articles=db('article')->find($arid);
	    $cates=db('cate')->find($articles['cateid']);//获取catename
        //$recres获取推荐频道推荐的文章,相同的catename，并且要已推荐，最多显示8条
	    $recres=db('article')->where(['cateid'=>$cates['id'],'state'=>1])->limit(8)->select();
	    //获取相关阅读的数据
	    $ralateres=$this->ralat($articles['keywords'],$articles['id']);
	    $this->assign(array(
	        'articles'=>$articles,
            'cates'=>$cates,
            'recres'=>$recres,
            'ralateres'=>$ralateres
        ));
		return $this->fetch();
	}
	public function ralat($keywords,$id)//获取相关阅读文章的方法
    {
        $arr=explode(',',$keywords);//获取关键字，并以,号切割成一个数组
        static $ralaters=array();//定义静态的数组来存放获取的文章
        foreach ($arr as $k=>$v)//查询数据库里所有有$arr数组里的关键字的文章
        {
            $map['keywords']=['like','%'.$v.'%'];//查询条件，keywords字段 like % $V %
            $map['id']=['neq',$id];//查询条件 id字段不能等于传入的id
            $artres=db('article')->where($map)->limit(8)->order('id desc')->select();//查询符合条件的文章
            $ralaters=array_merge($ralaters,$artres);//把查询到的数据$artres数组存放在$ralaters中变成二维数组
        }
        if($ralaters)
        {
            $ralaters=arr_unique($ralaters);//调用common中arr_unique去重复方法，去除$ralaters中重复的文章
            return $ralaters;
        }


    }
}