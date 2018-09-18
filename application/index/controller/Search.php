<?php
namespace app\index\controller;
use app\index\controller\Base;
class Search extends Base
{
	public function search()
    {
        $keywords = input('keywords');//接收搜索关键字
        if ($keywords)
        {
            $map['title']=['like','%'.$keywords.'%'];//查询条件
            //分页查询数据paginate(3,false,['query'=>['keywords'=>$keywords]]);'query'中传递的是URL参数，关键字需要在url中get到，否则分页失效
            $searchres=db('article')->where($map)->order('id desc')->paginate(3,false,['query'=>['keywords'=>$keywords]]);
            $this->assign(
                array(
                    'searchres'=>$searchres,
                    'keywords'=>$keywords
                )
            );
        }
        else
        {
            $this->assign(
                array(
                    'searchres'=>null,
                    'keywords'=>'暂无数据'
                )
            );
        }
		return $this->fetch('search');
	}
}