<?php
namespace app\admin\validate;
use think\Validate;//验证文件　　验证admin模块下的admin控制器；
class Admin extends Validate 
{
	
	 protected $rule = [//验证规则
        'username'  =>  'require|max:25|unique:admin',// //require 不能为空，ｍａｘ：２５，unique:admin表示不能重复
        'password' =>  'require',
    ];

    protected $message  =   [//验证不通过的错误提示
        'username.require' => '管理员名称必须填写',//username的require验证不通过，则提示信息
        'username.max' => '管理员名称长度不得大于25位',
        'username.unique' => '管理员名称不得重复',
        'password.require' => '管理员密码必须填写',

    ];

    protected $scene = [//验证场景
        'add'  =>  ['username'=>'require|unique:admin','password'],
        'edit'  =>  ['username'=>'require|unique:admin'],
    ];
}