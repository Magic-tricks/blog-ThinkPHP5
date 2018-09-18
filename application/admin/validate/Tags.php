<?php
namespace app\admin\validate;
use think\Validate;//验证文件　　验证admin模块下的admin控制器；
class Tags extends Validate
{
	
	 protected $rule = [//验证规则
        'tagname'  =>  'require|max:25|unique:tags',// //require 不能为空，ｍａｘ：２５

    ];

    protected $message  =   [//验证不通过的错误提示
        'tagname.require' => 'tags标签标题必须填写',//username的require验证不通过，则提示信息
        'tagname.max' => 'tags标签标题长度不得大于25位',
        'tagname.unique' => 'tags标签地址必须填写',
        

    ];

    protected $scene = [//验证场景
        'add'  =>  ['tagname'],
        'edit'  =>  ['tagname'],
    ];
}