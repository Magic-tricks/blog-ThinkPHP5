<?php
namespace app\admin\validate;
use think\Validate;//验证文件　　验证admin模块下的admin控制器；
class Links extends Validate 
{
	
	 protected $rule = [//验证规则
        'title'  =>  'require|max:25',// //require 不能为空，ｍａｘ：２５
        'url' =>  'require',
    ];

    protected $message  =   [//验证不通过的错误提示
        'title.require' => '链接标题必须填写',//username的require验证不通过，则提示信息
        'title.max' => '链接标题长度不得大于25位',
        'url.require' => '链接地址必须填写',
        

    ];

    protected $scene = [//验证场景
        'add'  =>  ['title','url'],
        'edit'  =>  ['title','url'],
    ];
}