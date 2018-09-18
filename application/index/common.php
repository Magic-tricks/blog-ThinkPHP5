<?php
//index模块下的公共函数文件
function arr_unique($arr2d)//二维数组去重复的方法
{
    foreach ($arr2d as $k => $v)
    {
        $v = join(',', $v);//把二维数组的第二维数据以,号相连组成一个字符串
        $temp[] = $v;//把该字符串放在$temp的一维数组中
    }
    if($temp)
    {
        $temp = array_unique($temp);//使用array_unique去除数组里面的重复值，注意，该函数只可以去除一维数组的重复值
        foreach ($temp as $k => $v)
        {
            $temp[$k]=explode(',',$v);//循环$temp数组,把$temp变成二维数组，并且吧$v字符串以,号切割成一个数组
    }

    }
    return $temp;
}