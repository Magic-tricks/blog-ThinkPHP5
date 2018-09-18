<?php
namespace app\admin\validate;
use think\Validate;//验证文件　　验证admin模块下的admin控制器；
class Article extends Validate
{
	
	 protected $rule = [//验证规则
        'title'  =>  'require|max:25',// //require 不能为空，ｍａｘ：２５
        'cateid' =>  'require',
    ];

    protected $message  =   [//验证不通过的错误提示
        'title.require' => '文章标题必须填写',//username的require验证不通过，则提示信息
        'title.max' => '文章标题长度不得大于25位',
        'cateid.require' => '请选择文章栏目',


    ];

    protected $scene = [//验证场景
        'add'  =>  ['title','cateid'],
        'edit'  =>  ['title','cateid'],
    ];
}