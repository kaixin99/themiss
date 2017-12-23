<?php
namespace namespacename;
/**
* 类
*/
class classname
{
	
	function __construct()
	{
		# code...
		echo __METHOD__;
	}
}

//全局变量
$a = 'namespacename\classname';
//new一个变量
$obj = new $a; // prints classname::__construct

//命名空间的应用对框架的搭建有帮助
//对网站的运行速度的提高有帮助

//new跟着的是一个字符串
$obj2 = new classname; 


?>