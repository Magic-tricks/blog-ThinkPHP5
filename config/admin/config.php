<?php
return [
'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'htm',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',
    ],
     'view_replace_str'       => [
        '__PUBLIC__'    => SITE_URL.'/public/static/admin',
         '__IMG__'  =>  SITE_URL.'/public'
    ],

    //放在此处的验证码配置无效，需放在convention惯例配置文件里面
    'captcha' => [
// 验证码字符集合
        'codeSet' => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
// 验证码字体大小(px)
        'fontSize' => 20,
// 是否画混淆曲线
        'useCurve' => false,
// 验证码图片高度
        'imageH' => 42,
//是否添加杂点
        'useNoise'=>false,
// 验证码图片宽度
        'imageW' => 148,
// 验证码位数
        'length' => 4,
// 验证成功后是否重置
        'reset' => true
    ],
    ];