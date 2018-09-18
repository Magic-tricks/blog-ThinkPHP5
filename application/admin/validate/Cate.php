<?php
namespace app\admin\validate;
use think\Validate;//验证文件　　验证admin模块下的admin控制器；
class Cate extends Validate
{

	 protected $rule = [//验证规则
        'catename'  =>  'require|max:25｜unique:cate',// //require 不能为空，ｍａｘ：２５,unique:cate表示cate表中的catename字段不能重复

    ];

    protected $message  =   [//验证不通过的错误提示
        'catename.require' => '栏目名称必须填写',//username的require验证不通过，则提示信息
        'catename.max' => '栏目名称长度不得大于25位',
        'catename.unique' => '栏目名称不得重复',


    ];

    protected $scene = [//验证场景
        'add'  =>  ['catename'=>'require|unique:cate'],
        'edit'  =>  ['username'=>'require'],
    ];
}