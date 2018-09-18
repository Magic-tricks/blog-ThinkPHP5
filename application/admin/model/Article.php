<?php
namespace app\admin\model;
use think\Model;
class Article extends Model
{
    public function cate()//cate()方法名称为需要关联的表的名称
    {
        return $this->belongsTo('cate','cateid');
        //定义相对关联,并且指定cate表外键字段为cateid
    }
}